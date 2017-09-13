<?php

/**
 * description
 *计算
 *
 * @category   Learn
 * @package    PSR
 * @subpackage Documentation\API
 */
class column
{
    public $day = 0;
    public $price = 5;
    public $sum = 0;

    public function __construct($day, $price, $sum)
    {
        $this->day = $day;
        $this->price = $price * 2;
        $this->sum = $sum;
    }

    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function discountPrice($sum)
    {
        if ($sum <= 100) {
            return $sum;
        } else {
            if ($sum >= 100 && $sum <= 150) {
                return ($sum - 100) * 0.8 + 100;
            } else {
                return ($sum - 150) * 0.5 + 50 * 0.8 + 100;
            }
        }
    }

    public function columnDay()
    {
        $price = $this->getPrice();
        $sum = $this->getSum();
        if ($sum <= 100) {
            $days = $sum / $price;
        } else {
            if ($sum > 100 && $sum <= 150) {
                $days = 100 / $price + ($sum - 100) / ($price * 0.8);
            } else {
                $days = 100 / $price + 150 / ($price * 0.8) + ($sum - 150) / ($price * 0.5);
            }
        }

        return $days;
    }

    /*
     * 计算
     * */
    public function columnSum()
    {
        $day = $this->getDay();
        $price = $this->price;
        $sum = $day * $price;

        return $this->discountPrice($sum);
    }


}

$day = $_GET['day'] ?? 0;
$price = $_GET['price'] ?? 5;
$sum = $_GET['sum'] ?? 0;
$type = $_GET['type'] ?? true;
$class = new column($day, $price, $sum);
if($type){
    echo $class->columnSum();
}else{
    echo $class->columnDay();
}

