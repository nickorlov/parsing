<?php

namespace App\Parsing;

class Parse
{
    public function parse(string $textToParse): void
    {
        $array = explode(PHP_EOL, $textToParse);
        $resultData = [];
        $count = -1;
        foreach ($array as $item) {
            if (
                preg_match_all("/from/i", $item) &&
                preg_match_all("/[A-Z]{2}/", $item, $matchesCountry) &&
                preg_match_all("/[0-9]{3,}/", $item, $matchesNumber)

            ) {
                $count++;
                $resultData[$count]['fromCountry'] = $matchesCountry[0];
                $resultData[$count]['fromNumber'] = $matchesNumber[0];
                continue;
            }

            if (
                preg_match_all("/[A-Z]{2}/", $item, $matchesCountries) &&
                preg_match_all("/[0-9]{3,}/", $item, $matchesNumbers)
            ) {
                $numbers = $matchesNumbers[0];
                $resultData[$count]['to'][] = [
                    'country' => $matchesCountries[0],
                    'number' => $numbers[0],
                    'weight' => $numbers[1],
                ];
                continue;
            }

            if (preg_match_all('/[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}/', $item, $matchesPhone)) {
                $resultData['phone'] = $matchesPhone[0];
            }
        }

        echo json_encode($resultData);
    }
}
