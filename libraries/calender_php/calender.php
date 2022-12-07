<?php
class Calendar {

    /**
     * Constructor
     */
    public function __construct(){
        $this->naviHref = htmlentities($_SERVER['HTTP_REFERER']);
    }

    /********************* PROPERTY ********************/
    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;
    private $arr2 = null;


    /********************* PUBLIC **********************/

    /**
     * print out the calendar
     */
    public function show($arr) {
        $year  = null;

        $month = null;

        if(null==$year&&isset($_GET['nam'])){

            $year = $_GET['nam'];

        }else if(null==$year){

            $year = date("Y",time());

        }

        if(null==$month&&isset($_GET['thang'])){

            $month = $_GET['thang'];

        }else if(null==$month){

            $month = date("m",time());

        }

        //Xử lý lấy dữ liệu ngày nghỉ đưa vào mảng



        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
            '<div class="box">'.
            $this->_createNavi().
            '</div>'.
            '<div class="box-content">'.
            '<ul class="label">'.$this->_createLabels().'</ul>';
        $content.='<div class="clear"></div>';
        $content.='<ul class="dates">';

        $weeksInMonth = $this->_weeksInMonth($month,$year);
        // Create weeks in a month

        $this->arr2 = $arr;
        $count = count($this->arr2);

        for( $i=0; $i<$weeksInMonth; $i++ ){
            $arr2 = $arr;
            //Create days in a week
            for($j=1;$j<=7;$j++){


                $content.=$this->_showDay($i*7+$j, $arr,$count);

            }
        }

        $content.='</ul>';

        $content.='<div class="clear"></div>';

        $content.='</div>';

        $content.='</div>';
        return $content;
    }

    /********************* PRIVATE **********************/
    /**
     * create the li element for ul
     */
    private function _showDay($cellNumber,$arr,$count){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-D',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $cellContent = sprintf("%02d",$this->currentDay);


            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }
        $str='';
        //xử lý ngày nghỉ
        if($cellContent != '')
        {
            if(in_array($cellContent,$arr)){


                for($i = 2 ;$i < $count; $i = $i + 2){

                    if($arr[$i] == $cellContent)
                    {

                        if($arr[$i +1] == 1){
                            $str = ' style=" background-color: #28d82c;"';
                        }
                        if($arr[$i +1] == 2){
                            $str = ' style=" background-color: #ee1422;"';
                        }
                        if($arr[$i +1] == 3){
                            $str = ' style=" background-color: #c028d8;"';
                        }
                        if($arr[$i +1] == 4){
                            $str = ' style=" background-color: #eeeb0f;"';
                        }
                    }
                }
            }
        }



        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            ($cellContent==null?'mask':'').'" '.$str.'>'.$cellContent.'</li>';
    }

    /**
     * create navigation
     */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

        return
            '<div class="header">'.
            '<a class="prev" href="'.$this->naviHref.'&thang='.sprintf('%02d',$preMonth).'&nam='.$preYear.'">Prev</a>'.
            '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
            '<a class="next" href="'.$this->naviHref.'&thang='.sprintf("%02d", $nextMonth).'&nam='.$nextYear.'">Next</a>'.
            '</div>';
    }

    /**
     * create calendar week labels
     */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';

        }

        return $content;
    }



    /**
     * calculate number of weeks in a particular month
     */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }

    /**
     * calculate number of days in a particular month
     */
    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }

}