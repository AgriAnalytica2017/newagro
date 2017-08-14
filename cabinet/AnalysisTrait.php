<?php
/**
 * Created by PhpStorm.
 * User: TadeskiOne
 * Date: 27.03.2017
 * Time: 14:29
 */

namespace module\FinancialAnalytics\traits;


trait AnalysisTrait
{
    protected $r1000 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1010 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1020 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1030 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1035 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1040 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1045 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1095 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1100 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1101 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1102 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1103 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1104 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1110 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1120 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1125 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1130 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1135 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1136 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1140 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1145 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1155 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1160 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1165 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1190 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1195 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1300 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1400 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1405 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1410 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1415 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1420 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1495 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1500 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1510 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1515 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1520 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1525 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1595 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1600 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1605 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1610 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1615 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1620 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1621 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1625 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1630 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1635 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1640 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1645 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1650 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1660 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1690 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1695 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r1900 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2000 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2050 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2090 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2095 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2120 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2130 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2150 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2180 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2190 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2195 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2220 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2240 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2250 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2270 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2290 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2295 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2300 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2350 = array(0 => 0, 1 => 0, 2 => 0);
    protected $r2355 = array(0 => 0, 1 => 0, 2 => 0);

    public function getTableData()
    {
        // TODO: Implement getTableData() method.
        return array_merge($this->simpleSelect("
            SELECT 
              `year`, 
              `code`, 
              `beginning_rp`, 
              `end_rp` 
            FROM `form1` WHERE `author` = '$this->author' AND `code` < 2000"), $this->simpleSelect(" 
            SELECT 
              `year`, 
              `code`, 
              `beginning_rp`, 
              `end_rp`
            FROM `form2` WHERE `author` = '$this->author' AND `code` >= 2000"));
    }
    public function sortTableData($data = []){
        foreach ($data as $item) {
            switch ($item['code']) {
                case 1000:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1000[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1000[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1000[2] = $item;
                            break;
                    }
                    break;
                case 1010:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1010[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1010[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1010[2] = $item;
                            break;
                    }
                    break;
                case 1020:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1020[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1020[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1020[2] = $item;
                            break;
                    }
                    break;
                case 1030:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1030[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1030[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1030[2] = $item;
                            break;
                    }
                    break;
                case 1035:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1035[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1035[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1035[2] = $item;
                            break;
                    }
                    break;
                case 1040:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1040[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1040[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1040[2] = $item;
                            break;
                    }
                    break;
                case 1045:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1045[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1045[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1045[2] = $item;
                            break;
                    }
                    break;
                case 1095:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1095[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1095[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1095[2] = $item;
                            break;
                    }
                    break;
                case 1100:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1100[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1100[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1100[2] = $item;
                            break;
                    }
                    break;
                case 1101:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1101[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1101[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1101[2] = $item;
                            break;
                    }
                    break;
                case 1102:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1102[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1102[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1102[2] = $item;
                            break;
                    }
                    break;
                case 1103:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1103[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1103[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1103[2] = $item;
                            break;
                    }
                    break;
                case 1104:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1104[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1104[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1104[2] = $item;
                            break;
                    }
                    break;
                case 1110:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1110[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1110[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1110[2] = $item;
                            break;
                    }
                    break;
                case 1120:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1120[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1120[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1120[2] = $item;
                            break;
                    }
                    break;
                case 1125:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1125[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1125[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1125[2] = $item;
                            break;
                    }
                    break;
                case 1130:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1130[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1130[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1130[2] = $item;
                            break;
                    }
                    break;
                case 1135:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1135[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1135[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1135[2] = $item;
                            break;
                    }
                    break;
                case 1136:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1136[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1136[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1136[2] = $item;
                            break;
                    }
                    break;
                case 1140:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1140[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1140[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1140[2] = $item;
                            break;
                    }
                    break;
                case 1145:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1145[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1145[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1145[2] = $item;
                            break;
                    }
                    break;
                case 1155:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1155[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1155[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1155[2] = $item;
                            break;
                    }
                    break;
                case 1160:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1160[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1160[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1160[2] = $item;
                            break;
                    }
                    break;
                case 1165:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1165[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1165[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1165[2] = $item;
                            break;
                    }
                    break;
                case 1190:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1190[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1190[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1190[2] = $item;
                            break;
                    }
                    break;
                case 1195:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1195[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1195[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1195[2] = $item;
                            break;
                    }
                    break;
                case 1300:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1300[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1300[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1300[2] = $item;
                            break;
                    }
                    break;
                case 1400:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1400[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1400[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1400[2] = $item;
                            break;
                    }
                    break;
                case 1405:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1405[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1405[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1405[2] = $item;
                            break;
                    }
                    break;
                case 1410:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1410[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1410[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1410[2] = $item;
                            break;
                    }
                    break;
                case 1415:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1415[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1415[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1415[2] = $item;
                            break;
                    }
                    break;
                case 1420:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1420[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1420[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1420[2] = $item;
                            break;
                    }
                    break;
                case 1495:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1495[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1495[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1495[2] = $item;
                            break;
                    }
                    break;
                case 1500:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1500[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1500[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1500[2] = $item;
                            break;
                    }
                    break;
                case 1510:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1510[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1510[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1510[2] = $item;
                            break;
                    }
                    break;
                case 1515:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1515[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1515[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1515[2] = $item;
                            break;
                    }
                    break;
                case 1520:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1520[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1520[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1520[2] = $item;
                            break;
                    }
                    break;
                case 1525:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1525[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1525[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1525[2] = $item;
                            break;
                    }
                    break;
                case 1595:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1595[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1595[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1595[2] = $item;
                            break;
                    }
                    break;
                case 1600:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1600[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1600[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1600[2] = $item;
                            break;
                    }
                    break;
                case 1605:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1605[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1605[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1605[2] = $item;
                            break;
                    }
                    break;
                case 1610:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1610[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1610[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1610[2] = $item;
                            break;
                    }
                    break;
                case 1615:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1615[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1615[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1615[2] = $item;
                            break;
                    }
                    break;
                case 1620:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1620[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1620[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1620[2] = $item;
                            break;
                    }
                    break;
                case 1621:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1621[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1621[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1621[2] = $item;
                            break;
                    }
                    break;
                case 1625:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1625[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1625[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1625[2] = $item;
                            break;
                    }
                    break;
                case 1630:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1630[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1630[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1630[2] = $item;
                            break;
                    }
                    break;
                case 1635:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1635[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1635[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1635[2] = $item;
                            break;
                    }
                    break;
                case 1640:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1640[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1640[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1640[2] = $item;
                            break;
                    }
                    break;
                case 1645:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1645[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1645[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1645[2] = $item;
                            break;
                    }
                    break;
                case 1650:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1650[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1650[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1650[2] = $item;
                            break;
                    }
                    break;
                case 1660:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1660[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1660[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1660[2] = $item;
                            break;
                    }
                    break;
                case 1690:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1690[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1690[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1690[2] = $item;
                            break;
                    }
                    break;
                case 1695:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1695[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1695[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1695[2] = $item;
                            break;
                    }
                    break;
                case 1900:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r1900[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r1900[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r1900[2] = $item;
                            break;
                    }
                    break;
                case 2000:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2000[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2000[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2000[2] = $item;
                            break;
                    }
                    break;
                case 2050:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2050[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2050[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2050[2] = $item;
                            break;
                    }
                    break;
                case 2090:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2090[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2090[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2090[2] = $item;
                            break;
                    }
                    break;
                case 2095:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2095[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2095[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2095[2] = $item;
                            break;
                    }
                    break;
                case 2120:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2120[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2120[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2120[2] = $item;
                            break;
                    }
                    break;
                case 2130:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2130[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2130[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2130[2] = $item;
                            break;
                    }
                    break;
                case 2150:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2150[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2150[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2150[2] = $item;
                            break;
                    }
                    break;
                case 2180:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2180[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2180[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2180[2] = $item;
                            break;
                    }
                    break;
                case 2190:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2190[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2190[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2190[2] = $item;
                            break;
                    }
                    break;
                case 2195:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2195[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2195[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2195[2] = $item;
                            break;
                    }
                    break;
                case 2220:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2220[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2220[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2220[2] = $item;
                            break;
                    }
                    break;
                case 2240:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2240[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2240[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2240[2] = $item;
                            break;
                    }
                    break;
                case 2250:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2250[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2250[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2250[2] = $item;
                            break;
                    }
                    break;
                case 2270:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2270[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2270[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2270[2] = $item;
                            break;
                    }
                    break;
                case 2290:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2290[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2290[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2290[2] = $item;
                            break;
                    }
                    break;
                case 2295:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2295[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2295[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2295[2] = $item;
                            break;
                    }
                    break;
                case 2300:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2300[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2300[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2300[2] = $item;
                            break;
                    }
                    break;
                case 2350:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2350[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2350[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2350[2] = $item;
                            break;
                    }
                    break;
                case 2355:
                    switch ($item['year']) {
                        case date("Y") - 3:
                            $this->r2355[0] = $item;
                            break;
                        case date("Y") - 2:
                            $this->r2355[1] = $item;
                            break;
                        case date("Y") - 1:
                            $this->r2355[2] = $item;
                            break;
                    }
                    break;
            }
        }
    }
}