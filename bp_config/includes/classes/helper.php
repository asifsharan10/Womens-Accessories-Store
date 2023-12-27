<?php

/**
 * Class Helper
 */
class Helper
{
    /**
     * @param $products
     * @param $sortType
     * @return array
     */
    public static function sortProducts($products, $sortType)
    {
        if (count($products)) {
            foreach ($products as $key => $product) {
                switch ($product['billingModel']) {
                    case '1':
                        if ($product['straightSaleMultiPrice'] == 'no') {
                            $products[$key]['priceToSort'] = $product['ssPrice'];
                        }
                        else {
                            $products[$key]['priceToSort'] = min(array_column($product['shop_option'], 'option_price'));
                        }

                        break;

                    case '2':
                    case '4':
                    case '6':
                        $products[$key]['priceToSort'] = $product['trialShipping'];
                        break;

                    case '3':
                        $products[$key]['priceToSort'] = $product['continuityPrice'] + $product['continuityShipping'];
                        break;

                    case '5':
                    case '7':
                        $products[$key]['priceToSort'] = $product['ssPrice'];
                        break;
                }
            }
        }

        switch ($sortType) {
            //alphabetical
            case 1:
                usort($products, function ($a, $b) {
                    return strcmp($a['name'], $b['name']);
                });

                return $products;

            //reverse alphabetical
            case 2:
                usort($products, function ($a, $b) {
                    return strcmp($b['name'], $a['name']);
                });

                return $products;

            //lowest to highest price
            case 3:
                usort($products, function ($a, $b) {
                    return $a['priceToSort'] > $b['priceToSort'];
                });

                return $products;

            //highest to lowest price
            case 4:
                usort($products, function ($a, $b) {
                    return $a['priceToSort'] < $b['priceToSort'];
                });

                return $products;

            //last to first product
            case 6:
                krsort($products);
                return $products;

            //shortest product name to longest product name
            case 7:
                usort($products, function ($a, $b) {
                    return strlen($a['name']) > strlen($b['name']);
                });

                return $products;

            //longest product name to shortest product name
            case 8:
                usort($products, function ($a, $b) {
                    return strlen($a['name']) < strlen($b['name']);
                });

                return $products;

            //first to last product array
            default: return $products;
        }
    }


    /**
     * @param $url
     * @return array
     */
    public static function getOptionPrices($url)
    {
        $request = json_decode(file_get_contents($url));
        $response = [];

        if ($request) {
            foreach ($request as $productNum => $options) {
                foreach ($options as $optionNum => $option) {
                    $response[$productNum][$optionNum] = [
                        'option_quantity' => $option->option_quantity,
                        'option_price' => $option->option_price
                    ];
                }
            }
        }

        return $response;
    }
}