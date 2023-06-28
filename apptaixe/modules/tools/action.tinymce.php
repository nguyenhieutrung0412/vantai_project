<?php
/**
 * @Name: Shopnhac.com - Version 1.0
 * @Author: Mr.Phin <mh.phin@gmail.com>
 * @Link: https://www.facebook.com/hoaphin
 * @Copyright: &copy; 2021 Shopnhac.com
 */
defined('_ROOT') or die(__FILE__);
if($_GET['do']=='delete'){
	if($_GET['file'] && file_exists(_BACKUP.$_GET['file'])){
		unlink(_BACKUP.$_GET['file']);
	}
	$hook->redirect('./?mod='.$system->module.'&act='.$system->action);
}
if($_GET['do']=='download'){
	if($_GET['file'] && file_exists(_BACKUP.$_GET['file'])){
		if ($fp = fopen(_BACKUP . $_GET['file'], 'rb')) {
		$buffer = fread($fp, filesize(_BACKUP . $_GET['file']));
		fclose($fp);
		
		header('Content-type: application/x-octet-stream');
		header('Content-disposition: attachment; filename=' . $_GET['file']);
		
		echo $buffer;
		
		exit;
		}
	}
	$hook->redirect('./?mod='.$system->module.'&act='.$system->action);
}
if($_POST){
	$backup_file = 'db_' . $_SERVER['HTTP_HOST'] . '-' . date('Y-m-d H-i-s') . '.sql';
	$fp = fopen(_BACKUP . $backup_file, 'w');
	$schema = '# CaoBox v1' . "\n" .
			  '# http://www.phpbasic.com' . "\n" .
			  '# Backup Date: ' . date('Y-m-d h:i:s') . "\n\n";
	fputs($fp, $schema);
	
	 $tables_query = $model->db->query('show tables');
     while ($tables = $tables_query->fetch()) {
          list(,$table) = each($tables);

          $schema = 'drop table if exists ' . $table . ';' . "\n" .
                    'create table ' . $table . ' (' . "\n";

          $table_list = array();
          $fields_query = $model->db->query("show fields from " . $table);
          while ($fields = $fields_query->fetch()) {
            $table_list[] = $fields['Field'];

            $schema .= '  ' . $fields['Field'] . ' ' . $fields['Type'];

            if (strlen($fields['Default']) > 0) $schema .= ' default \'' . $fields['Default'] . '\'';

            if ($fields['Null'] != 'YES') $schema .= ' not null';

            if (isset($fields['Extra'])) $schema .= ' ' . $fields['Extra'];

            $schema .= ',' . "\n";
          }

          $schema = ereg_replace(",\n$", '', $schema);

// add the keys
          $index = array();
          $keys_query = $model->db->query("show keys from " . $table);
          while ($keys = $keys_query->fetch()) {
            $kname = $keys['Key_name'];

            if (!isset($index[$kname])) {
              $index[$kname] = array('unique' => !$keys['Non_unique'],
                                     'fulltext' => ($keys['Index_type'] == 'FULLTEXT' ? '1' : '0'),
                                     'columns' => array());
            }

            $index[$kname]['columns'][] = $keys['Column_name'];
          }

          while (list($kname, $info) = each($index)) {
            $schema .= ',' . "\n";

            $columns = implode($info['columns'], ', ');

            if ($kname == 'PRIMARY') {
              $schema .= '  PRIMARY KEY (' . $columns . ')';
            } elseif ( $info['fulltext'] == '1' ) {
              $schema .= '  FULLTEXT ' . $kname . ' (' . $columns . ')';
            } elseif ($info['unique']) {
              $schema .= '  UNIQUE ' . $kname . ' (' . $columns . ')';
            } else {
              $schema .= '  KEY ' . $kname . ' (' . $columns . ')';
            }
          }

          $schema .= "\n" . ');' . "\n\n";
          fputs($fp, $schema);

// dump the data
            $rows_query = $model->db->query("select " . implode(',', $table_list) . " from " . $table);
            while ($rows = $rows_query->fetch()) {
              $schema = 'insert into ' . $table . ' (' . implode(', ', $table_list) . ') values (';

              reset($table_list);
              while (list(,$i) = each($table_list)) {
                if (!isset($rows[$i])) {
                  $schema .= 'NULL, ';
                } elseif ($rows[$i]) {
                  $row = addslashes($rows[$i]);
                  $row = ereg_replace("\n#", "\n".'\#', $row);

                  $schema .= '\'' . $row . '\', ';
                } else {
                  $schema .= '\'\', ';
                }
              }

              $schema = ereg_replace(', $', '', $schema) . ');' . "\n";
              fputs($fp, $schema);
            }
        }
	if($_POST['download_only']){
	      header('Content-type: application/x-octet-stream');
          header('Content-disposition: attachment; filename=' . $backup_file);

          readfile(_BACKUP . $backup_file);
          unlink(_BACKUP . $backup_file);
		  exit();
	}
	
	$hook->redirect('./?mod='.$system->module.'&act='.$system->action);

}



if($_GET['do'] == 'new'){
	$tpl->setfile(array(
		'body'=>'tools.'.$system->action.'.new.tpl',
	));

}else{
	$tpl->setfile(array(
		'body'=>'tools.'.$system->action.'.tpl',
	));
    $dir = dir(_BACKUP);
    $contents = array();
    while ($file = $dir->read()) {
      if (!is_dir(_BACKUP . $file) && in_array(substr($file, -3), array('zip', 'sql', '.gz'))) {
        $contents[] = $file;
      }
    }
    sort($contents);
	
	foreach($contents as $entry){
		$rs = array();
		$rs['name'] = $entry;
		$tpl->assign($rs,'files');
	}
	$request = array();
	$request['_BACKUP'] = _BACKUP;
	
	$tpl->assign($request);

}
?>