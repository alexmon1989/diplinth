<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'description'];
    protected $fillable = ['in_stock', 'enabled'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['heights'];

    public function heights()
    {
        return $this->hasMany('App\ProductHeight');
    }

    /**
     * Возвращает склеенные величины возможных высот плинтуса.
     *
     * @param string $separator разделитель
     * @return string
     */
    public function getSeparatedHeights($separator = '/') {
        $heights = $this->heights()->whereAvailable(true)->orderBy('value')->get();
        $heights_arr = [];
        foreach ($heights as $value) {
            $heights_arr[] = $value->value;
        }
        $res = implode($separator, $heights_arr);
        if ($res) {
            return $res;
        }
        return '-';
    }

    /**
     * Возвращает склеенные величины возможных цен плинтуса.
     *
     * @param string $separator разделитель
     * @return string
     */
    public function getSeparatedPrices($separator = '/') {
        $prices = $this->heights()->whereAvailable(true)->orderBy('value')->get();
        $prices_arr = [];
        foreach ($prices as $value) {
            $prices_arr[] = number_format($value->price, 1, ',', ' ');
        }

        $res = implode($separator, $prices_arr);
        if ($res) {
            return $res;
        }
        return '-';
    }
}
