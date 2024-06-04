<?php

namespace App\Helpers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HelperMethods
{
    /**
     * Return true if is an image
     * Can be called like this \App\Facades\HelperMethods::isImage($user->getFirstMedia('avatar'))
     * @param Media $media
     * @return bool
     */
    public static function isImage(Media $media) : bool
    {
        return str_contains($media->mime_type , 'image');
    }

    /**
     * Return true if is a video
     * Can be called like this \App\Facades\HelperMethods::isVideo($user->getFirstMedia('file'))
     * @param Media $media
     * @return bool
     */
    public static function isVideo(Media $media) : bool
    {
        return str_contains($media->mime_type , 'video') || str_contains($media->mime_type , 'application/x-mpegURL');
    }


    /**
     * Return the file size in human readable format
     * @param $size in bytes
     * @param int $precision
     * @return string
     */
    public static function bytesToHuman($bytes, $precision = 2) : string
    {
        $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $step = 1024;
        $i = 0;
        while (($bytes / $step) > 0.9) {
            $bytes = $bytes / $step;
            $i++;
        }
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    /**
     * Return the languages available on the platform
     * @return array
     */
    public static function getLangArray() : array
    {
        return [
            'PT' => __('Portuguese'),
            'EN' => __('English'),
        ];
    }

    /**
     * Return the language that the user want
     * @return String
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function getLang() : String
    {
        //check lang if requested on request otherwise check if user is logged in and use the lang options
        if(empty($lang = request()->get('lang',null))){
            if(auth()->guest()){
                $lang = 'PT';
            }else{
                $lang = auth()->user()->lang ?? 'PT';
            }
            return $lang;
        }
        //check if the requested lang is valid otherwise use PT
        if(isset(self::getLangArray()[$lang]))
            return $lang;
        else
            return 'PT';
    }

    /**
     * Return the countries available on the platform
     * @return array
     */
    public static function getCountriesArray(): array
    {
        return [
            "Afghanistan" => "Afghanistan",
            "Albania" => "Albania",
            "Algeria" => "Algeria",
            "Andorra" => "Andorra",
            "Angola" => "Angola",
            "Antigua and Barbuda" => "Antigua and Barbuda",
            "Argentina" => "Argentina",
            "Armenia" => "Armenia",
            "Australia" => "Australia",
            "Austria" => "Austria",
            "Azerbaijan" => "Azerbaijan",
            "Bahamas" => "Bahamas",
            "Bahrain" => "Bahrain",
            "Bangladesh" => "Bangladesh",
            "Barbados" => "Barbados",
            "Belarus" => "Belarus",
            "Belgium" => "Belgium",
            "Belize" => "Belize",
            "Benin" => "Benin",
            "Bhutan" => "Bhutan",
            "Bolivia" => "Bolivia",
            "Bosnia and Herzegovina" => "Bosnia and Herzegovina",
            "Botswana" => "Botswana",
            "Brazil" => "Brazil",
            "Brunei" => "Brunei",
            "Bulgaria" => "Bulgaria",
            "Burkina Faso" => "Burkina Faso",
            "Burundi" => "Burundi",
            "Côte d'Ivoire" => "Côte d'Ivoire",
            "Cabo Verde" => "Cabo Verde",
            "Cambodia" => "Cambodia",
            "Cameroon" => "Cameroon",
            "Canada" => "Canada",
            "Central African Republic" => "Central African Republic",
            "Chad" => "Chad",
            "Chile" => "Chile",
            "China" => "China",
            "Colombia" => "Colombia",
            "Comoros" => "Comoros",
            "Congo (Congo-Brazzaville)" => "Congo (Congo-Brazzaville)",
            "Costa Rica" => "Costa Rica",
            "Croatia" => "Croatia",
            "Cuba" => "Cuba",
            "Cyprus" => "Cyprus",
            "Czechia (Czech Republic)" => "Czechia (Czech Republic)",
            "Democratic Republic of the Congo" => "Democratic Republic of the Congo",
            "Denmark" => "Denmark",
            "Djibouti" => "Djibouti",
            "Dominica" => "Dominica",
            "Dominican Republic" => "Dominican Republic",
            "Ecuador" => "Ecuador",
            "Egypt" => "Egypt",
            "El Salvador" => "El Salvador",
            "Equatorial Guinea" => "Equatorial Guinea",
            "Eritrea" => "Eritrea",
            "Estonia" => "Estonia",
            "Eswatini (fmr. Swaziland)" => "Eswatini (fmr. Swaziland)",
            "Ethiopia" => "Ethiopia",
            "Fiji" => "Fiji",
            "Finland" => "Finland",
            "France" => "France",
            "Gabon" => "Gabon",
            "Gambia" => "Gambia",
            "Georgia" => "Georgia",
            "Germany" => "Germany",
            "Ghana" => "Ghana",
            "Greece" => "Greece",
            "Grenada" => "Grenada",
            "Guatemala" => "Guatemala",
            "Guinea" => "Guinea",
            "Guinea-Bissau" => "Guinea-Bissau",
            "Guyana" => "Guyana",
            "Haiti" => "Haiti",
            "Holy See" => "Holy See",
            "Honduras" => "Honduras",
            "Hungary" => "Hungary",
            "Iceland" => "Iceland",
            "India" => "India",
            "Indonesia" => "Indonesia",
            "Iran" => "Iran",
            "Iraq" => "Iraq",
            "Ireland" => "Ireland",
            "Israel" => "Israel",
            "Italy" => "Italy",
            "Jamaica" => "Jamaica",
            "Japan" => "Japan",
            "Jordan" => "Jordan",
            "Kazakhstan" => "Kazakhstan",
            "Kenya" => "Kenya",
            "Kiribati" => "Kiribati",
            "Kuwait" => "Kuwait",
            "Kyrgyzstan" => "Kyrgyzstan",
            "Laos" => "Laos",
            "Latvia" => "Latvia",
            "Lebanon" => "Lebanon",
            "Lesotho" => "Lesotho",
            "Liberia" => "Liberia",
            "Libya" => "Libya",
            "Liechtenstein" => "Liechtenstein",
            "Lithuania" => "Lithuania",
            "Luxembourg" => "Luxembourg",
            "Madagascar" => "Madagascar",
            "Malawi" => "Malawi",
            "Malaysia" => "Malaysia",
            "Maldives" => "Maldives",
            "Mali" => "Mali",
            "Malta" => "Malta",
            "Marshall Islands" => "Marshall Islands",
            "Mauritania" => "Mauritania",
            "Mauritius" => "Mauritius",
            "Mexico" => "Mexico",
            "Micronesia" => "Micronesia",
            "Moldova" => "Moldova",
            "Monaco" => "Monaco",
            "Mongolia" => "Mongolia",
            "Montenegro" => "Montenegro",
            "Morocco" => "Morocco",
            "Mozambique" => "Mozambique",
            "Myanmar (formerly Burma)" => "Myanmar (formerly Burma)",
            "Namibia" => "Namibia",
            "Nauru" => "Nauru",
            "Nepal" => "Nepal",
            "Netherlands" => "Netherlands",
            "New Zealand" => "New Zealand",
            "Nicaragua" => "Nicaragua",
            "Niger" => "Niger",
            "Nigeria" => "Nigeria",
            "North Korea" => "North Korea",
            "North Macedonia" => "North Macedonia",
            "Norway" => "Norway",
            "Oman" => "Oman",
            "Pakistan" => "Pakistan",
            "Palau" => "Palau",
            "Palestine State" => "Palestine State",
            "Panama" => "Panama",
            "Papua New Guinea" => "Papua New Guinea",
            "Paraguay" => "Paraguay",
            "Peru" => "Peru",
            "Philippines" => "Philippines",
            "Poland" => "Poland",
            "Portugal" => "Portugal",
            "Qatar" => "Qatar",
            "Romania" => "Romania",
            "Russia" => "Russia",
            "Rwanda" => "Rwanda",
            "Saint Kitts and Nevis" => "Saint Kitts and Nevis",
            "Saint Lucia" => "Saint Lucia",
            "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines",
            "Samoa" => "Samoa",
            "San Marino" => "San Marino",
            "Sao Tome and Principe" => "Sao Tome and Principe",
            "Saudi Arabia" => "Saudi Arabia",
            "Senegal" => "Senegal",
            "Serbia" => "Serbia",
            "Seychelles" => "Seychelles",
            "Sierra Leone" => "Sierra Leone",
            "Singapore" => "Singapore",
            "Slovakia" => "Slovakia",
            "Slovenia" => "Slovenia",
            "Solomon Islands" => "Solomon Islands",
            "Somalia" => "Somalia",
            "South Africa" => "South Africa",
            "South Korea" => "South Korea",
            "South Sudan" => "South Sudan",
            "Spain" => "Spain",
            "Sri Lanka" => "Sri Lanka",
            "Sudan" => "Sudan",
            "Suriname" => "Suriname",
            "Sweden" => "Sweden",
            "Switzerland" => "Switzerland",
            "Syria" => "Syria",
            "Tajikistan" => "Tajikistan",
            "Tanzania" => "Tanzania",
            "Thailand" => "Thailand",
            "Timor-Leste" => "Timor-Leste",
            "Togo" => "Togo",
            "Tonga" => "Tonga",
            "Trinidad and Tobago" => "Trinidad and Tobago",
            "Tunisia" => "Tunisia",
            "Turkey" => "Turkey",
            "Turkmenistan" => "Turkmenistan",
            "Tuvalu" => "Tuvalu",
            "Uganda" => "Uganda",
            "Ukraine" => "Ukraine",
            "United Arab Emirates" => "United Arab Emirates",
            "United Kingdom" => "United Kingdom",
            "United States of America" => "United States of America",
            "Uruguay" => "Uruguay",
            "Uzbekistan" => "Uzbekistan",
            "Vanuatu" => "Vanuatu",
            "Venezuela" => "Venezuela",
            "Vietnam" => "Vietnam",
            "Yemen" => "Yemen",
            "Zambia" => "Zambia",
            "Zimbabwe" => "Zimbabwe"
        ];
    }
}
