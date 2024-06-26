<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Scout | Check Real-Time Weather and Local Time Anywhere</title>
    <meta name="description" content="Access up-to-date weather forecasts and local time for any city worldwide with Weather Scout. Stay informed about the weather conditions to plan your day effectively.">
    <meta name="keywords" content="weather, local time, weather check, real-time weather, weather forecast, local weather, world weather, city weather">
    <meta name="author" content="Nikola Radišić [rade023.com]">
    <link rel="icon" type="image/svg+xml" href="img/favicon.svg">
    <link rel="canonical" href="https://yourwebsite.com/" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://yourwebsite.com/">
    <meta property="og:title" content="Weather Scout | Check Real-Time Weather and Local Time Anywhere">
    <meta property="og:description" content="Access up-to-date weather forecasts and local time for any city worldwide with Weather Scout. Stay informed about the weather conditions to plan your day effectively.">
    <meta property="og:image" content="https://yourwebsite.com/path_to_your_logo_or_image.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://yourwebsite.com/">
    <meta property="twitter:title" content="Weather Scout | Check Real-Time Weather and Local Time Anywhere">
    <meta property="twitter:description" content="Access up-to-date weather forecasts and local time for any city worldwide with Weather Scout. Stay informed about the weather conditions to plan your day effectively.">
    <meta property="twitter:image" content="https://yourwebsite.com/path_to_your_logo_or_image.jpg">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Live Weather and Local Time</h1>
        <div class="input-box">
            <i class="uil uil-search"></i>
            <input type="text" id="cityInput" placeholder="Enter a city name">
            <button class="button" onclick="fetchWeather()">Get Weather</button>
        </div>
        <div id="weatherData"></div>

        <div class="box">
            <div class="d-flex justify-content-between align-items-center">
                <div class="date-box d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" /><path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" /></svg>
                    <span class="date">${formattedDate}</span>
                </div>
                <div class="time-box d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"><path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" /></svg>
                    <span class="time">${formattedTime}</span>
                </div>
            </div>
            <div class="box-blue d-flex align-items-center justify-content-center">
                <div class="weather-icon"></div>
                <div class="weather-content">
                    <h2>${cityCountry}</h2>
                    <div class="temp">${temperature}</div>
                    <div class="weather-description"></div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center t">
                <div class="text-center">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.448 511.448" style="enable-background:new 0 0 511.448 511.448;" xml:space="preserve"><path d="M344.556,112.216C318.38,78.84,291.34,44.344,269.516,7.32c-5.76-9.76-21.824-9.76-27.552,0 c-21.856,37.024-48.896,71.52-75.072,104.896c-53.056,67.68-103.168,131.616-103.168,207.232c0,105.888,86.112,192,192,192 s192-86.112,192-192C447.724,243.832,397.612,179.896,344.556,112.216z M207.724,191.448c26.464,0,48,21.536,48,48 s-21.536,48-48,48s-48-21.536-48-48S181.26,191.448,207.724,191.448z M187.052,410.776c-3.136,3.104-7.232,4.672-11.328,4.672 s-8.192-1.568-11.328-4.672c-6.24-6.24-6.24-16.384,0-22.624l160-160c6.24-6.24,16.384-6.24,22.624,0 c6.24,6.24,6.272,16.384,0.032,22.624L187.052,410.776z M303.724,447.448c-26.464,0-48-21.536-48-48s21.536-48,48-48 s48,21.536,48,48S330.188,447.448,303.724,447.448z"/></svg>
                    <span class="w-100 d-block">Humidity</span>
                    <div class="humidity">${humidity}%</div>
                </div>
                <div class="text-center">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M176,368H16c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h160c8.832,0,16,7.2,16,16s-7.168,16-16,16 c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c26.464,0,48-21.536,48-48S202.464,368,176,368z"/></g></g><g><g><path d="M208,112c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c8.832,0,16,7.168,16,16c0,8.832-7.168,16-16,16H16 c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h192c26.464,0,48-21.536,48-48S234.464,112,208,112z"/></g></g><g><g><path d="M336,144c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16c26.464,0,48,21.536,48,48s-21.536,48-48,48H16 c-8.832,0-16,7.168-16,16c0,8.832,7.168,16,16,16h320c44.128,0,80-35.904,80-80S380.128,144,336,144z"/></g></g><g><g><circle cx="320" cy="464" r="32"/></g></g><g><g><circle cx="480" cy="368" r="32"/></g></g><g><g><circle cx="480" cy="144" r="32"/></g></g><g><g><circle cx="352" cy="48" r="32"/></g></g></svg>
                    <span class="w-100 d-block">Wind</span>
                    <div class="wind">${windSpeed} km/h</div>
                </div>
                <div class="text-center">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M416,144c-1.024,0-2.048,0-3.136,0.032C397.952,70.016,333.088,16,256,16c-64.032,0-121.504,38.112-146.688,96.032 C48.8,113.472,0,163.136,0,224c0,61.76,50.24,112,112,112h304c52.928,0,96-43.072,96-96C512,187.072,468.928,144,416,144z"/></g></g><g><g><path d="M413.152,374.912c-5.92-8.64-20.384-8.64-26.304,0C376.384,390.048,352,427.52,352,448c0,26.464,21.536,48,48,48 s48-21.536,48-48C448,427.52,423.616,390.048,413.152,374.912z"/></g></g><g><g><path d="M269.152,374.912c-5.952-8.64-20.352-8.64-26.304,0C232.352,390.048,208,427.52,208,448c0,26.464,21.536,48,48,48 s48-21.536,48-48C304,427.52,279.648,390.048,269.152,374.912z"/></g></g><g><g><path d="M125.152,374.912c-5.952-8.64-20.352-8.64-26.304,0C88.352,390.048,64,427.52,64,448c0,26.464,21.536,48,48,48 s48-21.536,48-48C160,427.52,135.648,390.048,125.152,374.912z"/></g></g></svg>
                    <span class="w-100 d-block">Precipitation</span>
                    <div class="precipitation">${precipitation}%</div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- SVG for Cloudy -->
    <div class="element cloudy">
        <!-- SVG code for Cloudy -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60.7 40" style="enable-background:new 0 0 60.7 40;" xml:space="preserve"><g id="Cloud_1"><g id="White_cloud_1"><path id="XMLID_2_" class="white" d="M47.2,40H7.9C3.5,40,0,36.5,0,32.1l0,0c0-4.3,3.5-7.9,7.9-7.9h39.4c4.3,0,7.9,3.5,7.9,7.9v0 C55.1,36.5,51.6,40,47.2,40z"/><circle id="XMLID_3_" class="white" cx="17.4" cy="22.8" r="9.3"/><circle id="XMLID_4_" class="white" cx="34.5" cy="21.1" r="15.6"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;5;0" calcMode="linear"></animateTransform></g><g id="Gray_cloud_1"><path id="XMLID_6_" class="gray" d="M54.7,22.3H33.4c-3.3,0-6-2.7-6-6v0c0-3.3,2.7-6,6-6h21.3c3.3,0,6,2.7,6,6v0 C60.7,19.6,58,22.3,54.7,22.3z"/><circle id="XMLID_7_" class="gray" cx="45.7" cy="10.7" r="10.7"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;-3;0" calcMode="linear"></animateTransform></g></g></svg>
    </div>

    <!-- SVG for Rainy -->
    <div class="element rainy">
        <!-- SVG code for Rainy -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55.1 60" style="enable-background:new 0 0 55.1 49.5;" xml:space="preserve"><g id="Cloud_2"><g id="Rain_2"><path id="rain_2_left" class="white" d="M20.7,46.4c0,1.7-1.4,3.1-3.1,3.1s-3.1-1.4-3.1-3.1c0-1.7,3.1-7.8,3.1-7.8 S20.7,44.7,20.7,46.4z"></path><path id="rain_2_mid" class="white" d="M31.4,46.4c0,1.7-1.4,3.1-3.1,3.1c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,3.1-7.8,3.1-7.8 S31.4,44.7,31.4,46.4z"></path><path id="rain_2_right" class="white" d="M41.3,46.4c0,1.7-1.4,3.1-3.1,3.1c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,3.1-7.8,3.1-7.8 S41.3,44.7,41.3,46.4z"></path><animateTransform attributeName="transform" attributeType="XML" dur="1s" keyTimes="0;1" repeatCount="indefinite" type="translate" values="0 0;0 10" calcMode="linear"></animateTransform><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="1s" keyTimes="0;1" repeatCount="indefinite" values="1;0" calcMode="linear"/></g><g id="White_cloud_2"><path id="XMLID_14_" class="white" d="M47.2,34.5H7.9c-4.3,0-7.9-3.5-7.9-7.9l0,0c0-4.3,3.5-7.9,7.9-7.9h39.4c4.3,0,7.9,3.5,7.9,7.9 v0C55.1,30.9,51.6,34.5,47.2,34.5z"/><circle id="XMLID_13_" class="white" cx="17.4" cy="17.3" r="9.3"/><circle id="XMLID_10_" class="white" cx="34.5" cy="15.6" r="15.6"/></g></g></svg>
    </div>

    <!-- SVG for Cloudy with Sun -->
    <div class="element cloudy-with-sun">
        <!-- SVG code for Cloudy with Sun -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 61.7 42.8" style="enable-background:new 0 0 61.7 42.8;" xml:space="preserve"><g id="Cloud_3"><g id="White_cloud_3"><path id="XMLID_24_" class="white" d="M47.2,42.8H7.9c-4.3,0-7.9-3.5-7.9-7.9l0,0C0,30.5,3.5,27,7.9,27h39.4c4.3,0,7.9,3.5,7.9,7.9 v0C55.1,39.2,51.6,42.8,47.2,42.8z"/><circle id="XMLID_23_" class="white" cx="17.4" cy="25.5" r="9.3"/><circle id="XMLID_22_" class="white" cx="34.5" cy="23.9" r="15.6"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;5;0" calcMode="linear"></animateTransform></g><g id="Sun_3"><circle id="XMLID_30_" class="yellow" cx="31.4" cy="18.5" r="9"/><g><path id="XMLID_31_" class="yellow" d="M31.4,6.6L31.4,6.6c-0.4,0-0.6-0.3-0.6-0.6V0.6C30.8,0.3,31,0,31.3,0l0.1,0 C31.7,0,32,0.3,32,0.6v5.5C32,6.4,31.7,6.6,31.4,6.6z"/><path id="XMLID_34_" class="yellow" d="M31.4,30.1L31.4,30.1c-0.4,0-0.6,0.3-0.6,0.6v5.5c0,0.3,0.3,0.6,0.6,0.6h0.1 c0.3,0,0.6-0.3,0.6-0.6v-5.5C32,30.4,31.7,30.1,31.4,30.1z"/><path id="XMLID_35_" class="yellow" d="M19.6,18.3L19.6,18.3c0,0.4-0.3,0.6-0.6,0.6h-5.5c-0.3,0-0.6-0.3-0.6-0.6v-0.1 c0-0.3,0.3-0.6,0.6-0.6H19C19.3,17.8,19.6,18,19.6,18.3z"/><path id="XMLID_33_" class="yellow" d="M43.1,18.3L43.1,18.3c0,0.4,0.3,0.6,0.6,0.6h5.5c0.3,0,0.6-0.3,0.6-0.6v-0.1 c0-0.3-0.3-0.6-0.6-0.6h-5.5C43.4,17.8,43.1,18,43.1,18.3z"/><path id="XMLID_37_" class="yellow" d="M22.4,26L22.4,26c0.3,0.3,0.2,0.7,0,0.9l-4.2,3.6c-0.2,0.2-0.6,0.2-0.8-0.1l-0.1-0.1 c-0.2-0.2-0.2-0.6,0.1-0.8l4.2-3.6C21.9,25.8,22.2,25.8,22.4,26z"/><path id="XMLID_36_" class="yellow" d="M40.3,10.7L40.3,10.7c0.3,0.3,0.6,0.3,0.8,0.1l4.2-3.6c0.2-0.2,0.3-0.6,0.1-0.8l-0.1-0.1 c-0.2-0.2-0.6-0.3-0.8-0.1l-4.2,3.6C40.1,10.1,40,10.5,40.3,10.7z"/><path id="XMLID_39_" class="yellow" d="M22.4,10.8L22.4,10.8c0.3-0.3,0.2-0.7,0-0.9l-4.2-3.6c-0.2-0.2-0.6-0.2-0.8,0.1l-0.1,0.1 c-0.2,0.2-0.2,0.6,0.1,0.8l4.2,3.6C21.9,11,22.2,11,22.4,10.8z"/><path id="XMLID_38_" class="yellow" d="M40.3,26.1L40.3,26.1c0.3-0.3,0.6-0.3,0.8-0.1l4.2,3.6c0.2,0.2,0.3,0.6,0.1,0.8l-0.1,0.1 c-0.2,0.2-0.6,0.3-0.8,0.1l-4.2-3.6C40.1,26.7,40,26.3,40.3,26.1z"/><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="0.5s" keyTimes="0;0.5;1" repeatCount="indefinite" values="1;0.6;1" calcMode="linear"/></g></g><animateTransform attributeName="transform" attributeType="XML" dur="2s" keyTimes="0;1" repeatCount="indefinite" type="scale" values="1;1" calcMode="linear"></animateTransform></g><g id="Gray_cloud_3"><path id="XMLID_20_" class="gray" d="M55.7,25.1H34.4c-3.3,0-6-2.7-6-6v0c0-3.3,2.7-6,6-6h21.3c3.3,0,6,2.7,6,6v0 C61.7,22.4,59,25.1,55.7,25.1z"/><circle id="XMLID_19_" class="gray" cx="46.7" cy="13.4" r="10.7"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;-3;0" calcMode="linear"></animateTransform></g></g></svg>
    </div>

    <!-- SVG for Cloudy with Lightning -->
    <div class="element cloudy-with-lightning">
        <!-- SVG code for Cloudy with Lightning -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60.7 48.7" style="enable-background:new 0 0 60.7 48.7;" xml:space="preserve"><g id="Cloud_4"><g id="White_cloud_4"><path id="XMLID_69_" class="white" d="M47.2,40H7.9C3.5,40,0,36.5,0,32.1l0,0c0-4.3,3.5-7.9,7.9-7.9h39.4c4.3,0,7.9,3.5,7.9,7.9v0 C55.1,36.5,51.6,40,47.2,40z"/><circle id="XMLID_68_" class="white" cx="17.4" cy="22.8" r="9.3"/><circle id="XMLID_67_" class="white" cx="34.5" cy="21.1" r="15.6"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;5;0" calcMode="linear"></animateTransform></g><g id="Gray_cloud_4"><path id="XMLID_65_" class="gray" d="M54.7,22.3H33.4c-3.3,0-6-2.7-6-6v0c0-3.3,2.7-6,6-6h21.3c3.3,0,6,2.7,6,6v0 C60.7,19.6,58,22.3,54.7,22.3z"/><circle id="XMLID_64_" class="gray" cx="45.7" cy="10.7" r="10.7"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;-3;0" calcMode="linear"></animateTransform></g><g id="Lightning_4"><path id="XMLID_79_" class="yellow" d="M43.6,22.7c-0.2,0.6-0.4,1.3-0.6,1.9c-0.2,0.6-0.4,1.2-0.7,1.8c-0.4,1.2-0.9,2.4-1.5,3.5 c-1,2.3-2.2,4.6-3.4,6.8l-1.7-2.9c3.2-0.1,6.3-0.1,9.5,0l3,0.1l-1.3,2.5c-1.1,2.1-2.2,4.2-3.5,6.2c-0.6,1-1.3,2-2,3 c-0.7,1-1.4,2-2.2,2.9c0.2-1.2,0.5-2.4,0.8-3.5c0.3-1.2,0.6-2.3,1-3.4c0.7-2.3,1.5-4.5,2.4-6.7l1.7,2.7c-3.2,0.1-6.3,0.2-9.5,0 l-3.4-0.1l1.8-2.8c1.4-2.1,2.8-4.2,4.3-6.2c0.8-1,1.6-2,2.4-3c0.4-0.5,0.8-1,1.3-1.5C42.7,23.7,43.1,23.2,43.6,22.7z"/><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="1.5s" keyTimes="0;0.5;1" repeatCount="indefinite" values="1;0;1" calcMode="linear"/></g></g></svg>
    </div>

    <!-- SVG for Cloudy with Moon -->
    <div class="element cloudy-with-moon">
        <!-- SVG code for Cloudy with Moon -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60.7 44.4" style="enable-background:new 0 0 60.7 44.4;" xml:space="preserve"><g id="Cloud_5"><g id="White_cloud_5"><path id="XMLID_49_" class="white" d="M47.2,44.4H7.9c-4.3,0-7.9-3.5-7.9-7.9l0,0c0-4.3,3.5-7.9,7.9-7.9h39.4c4.3,0,7.9,3.5,7.9,7.9 v0C55.1,40.9,51.6,44.4,47.2,44.4z"/><circle id="XMLID_48_" class="white" cx="17.4" cy="27.2" r="9.3"/><circle id="XMLID_47_" class="white" cx="34.5" cy="25.5" r="15.6"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;5;0" calcMode="linear"></animateTransform></g><path id="Moon_5" class="yellow" d="M33.6,17.9c-0.2-7.7,4.9-14.4,12-16.4c-2.3-1-4.9-1.5-7.6-1.5c-9.8,0.3-17.5,8.5-17.2,18.3 c0.3,9.8,8.5,17.5,18.3,17.2c2.7-0.1,5.2-0.8,7.5-1.9C39.3,32,33.8,25.6,33.6,17.9z"/><g id="Gray_cloud_5"><path id="XMLID_45_" class="gray" d="M54.7,26.8H33.4c-3.3,0-6-2.7-6-6v0c0-3.3,2.7-6,6-6h21.3c3.3,0,6,2.7,6,6v0 C60.7,24.1,58,26.8,54.7,26.8z"/><circle id="XMLID_43_" class="gray" cx="45.7" cy="15.1" r="10.7"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;-3;0" calcMode="linear"></animateTransform></g></g></svg>
    </div>

    <!-- SVG for Cloudy with Rain and Lightning -->
    <div class="element cloudy-with-rain-and-lightning">
        <!-- SVG code for Cloudy with Rain and Lightning -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60.7 80" style="enable-background:new 0 0 60.7 55;" xml:space="preserve"><g id="Cloud_6"><g id="White_cloud_6"><path id="XMLID_81_" class="white" d="M47.2,40H7.9C3.5,40,0,36.5,0,32.1l0,0c0-4.3,3.5-7.9,7.9-7.9h39.4c4.3,0,7.9,3.5,7.9,7.9v0 C55.1,36.5,51.6,40,47.2,40z"/><circle id="XMLID_80_" class="white" cx="17.4" cy="22.8" r="9.3"/><circle id="XMLID_77_" class="white" cx="34.5" cy="21.1" r="15.6"/></g><g id="Gray_cloud_6"><path id="XMLID_75_" class="gray" d="M54.7,22.3H33.4c-3.3,0-6-2.7-6-6v0c0-3.3,2.7-6,6-6h21.3c3.3,0,6,2.7,6,6v0 C60.7,19.6,58,22.3,54.7,22.3z"/><circle id="XMLID_74_" class="gray" cx="45.7" cy="10.7" r="10.7"/><animateTransform attributeName="transform" attributeType="XML" dur="6s" keyTimes="0;0.5;1" repeatCount="indefinite" type="translate" values="0;-3;0" calcMode="linear"></animateTransform></g><g id="Lightning_6"><path id="XMLID_94_" class="yellow" d="M43.6,22.7c-0.2,0.6-0.4,1.3-0.6,1.9c-0.2,0.6-0.4,1.2-0.7,1.8c-0.4,1.2-0.9,2.4-1.5,3.5 c-1,2.3-2.2,4.6-3.4,6.8l-1.7-2.9c3.2-0.1,6.3-0.1,9.5,0l3,0.1l-1.3,2.5c-1.1,2.1-2.2,4.2-3.5,6.2c-0.6,1-1.3,2-2,3 c-0.7,1-1.4,2-2.2,2.9c0.2-1.2,0.5-2.4,0.8-3.5c0.3-1.2,0.6-2.3,1-3.4c0.7-2.3,1.5-4.5,2.4-6.7l1.7,2.7c-3.2,0.1-6.3,0.2-9.5,0 l-3.4-0.1l1.8-2.8c1.4-2.1,2.8-4.2,4.3-6.2c0.8-1,1.6-2,2.4-3c0.4-0.5,0.8-1,1.3-1.5C42.7,23.7,43.1,23.2,43.6,22.7z"/><animate attributeType="CSS"attributeName="opacity" attributeType="XML" dur="1.5s" keyTimes="0;0.5;1" repeatCount="indefinite" values="1;0;1" calcMode="linear"/></g><g id="Rain_6"><path id="Rain_6_right" class="white" d="M36.3,51.9c0,1.7-1.4,3.1-3.1,3.1c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,3.1-7.8,3.1-7.8 S36.3,50.2,36.3,51.9z"/><path id="Rain_6_mid" class="white" d="M26.4,51.9c0,1.7-1.4,3.1-3.1,3.1c-1.7,0-3.1-1.4-3.1-3.1c0-1.7,3.1-7.8,3.1-7.8 S26.4,50.2,26.4,51.9z"/><path id="Rain_6_left" class="white" d="M15.7,51.9c0,1.7-1.4,3.1-3.1,3.1s-3.1-1.4-3.1-3.1c0-1.7,3.1-7.8,3.1-7.8 S15.7,50.2,15.7,51.9z"/><animateTransform attributeName="transform"attributeType="XML" dur="1s" keyTimes="0;1" repeatCount="indefinite" type="translate" values="0 0;0 10" calcMode="linear"></animateTransform><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="1s" keyTimes="0;1" repeatCount="indefinite" values="1;0" calcMode="linear"/></g></g></svg>
    </div>

    <!-- SVG for Sunny -->
    <div class="element sunny">
        <!-- SVG code for Sunny -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 44.9 44.9" style="enable-background:new 0 0 44.9 44.9;" xml:space="preserve" height="40px" width="40px"><g id="Sun"><circle id="XMLID_61_" class="yellow" cx="22.4" cy="22.6" r="11"/><g><path id="XMLID_60_" class="yellow" d="M22.6,8.1h-0.3c-0.3,0-0.6-0.3-0.6-0.6v-7c0-0.3,0.3-0.6,0.6-0.6l0.3,0c0.3,0,0.6,0.3,0.6,0.6 v7C23.2,7.8,22.9,8.1,22.6,8.1z"/><path id="XMLID_59_" class="yellow" d="M22.6,36.8h-0.3c-0.3,0-0.6,0.3-0.6,0.6v7c0,0.3,0.3,0.6,0.6,0.6h0.3c0.3,0,0.6-0.3,0.6-0.6v-7 C23.2,37,22.9,36.8,22.6,36.8z"/><path id="XMLID_58_" class="yellow" d="M8.1,22.3v0.3c0,0.3-0.3,0.6-0.6,0.6h-7c-0.3,0-0.6-0.3-0.6-0.6l0-0.3c0-0.3,0.3-0.6,0.6-0.6h7 C7.8,21.7,8.1,21.9,8.1,22.3z"/><path id="XMLID_57_" class="yellow" d="M36.8,22.3v0.3c0,0.3,0.3,0.6,0.6,0.6h7c0.3,0,0.6-0.3,0.6-0.6v-0.3c0-0.3-0.3-0.6-0.6-0.6h-7 C37,21.7,36.8,21.9,36.8,22.3z"/><path id="XMLID_56_" class="yellow" d="M11.4,31.6l0.2,0.3c0.2,0.2,0.2,0.6-0.1,0.8l-5.3,4.5c-0.2,0.2-0.6,0.2-0.8-0.1l-0.2-0.3 c-0.2-0.2-0.2-0.6,0.1-0.8l5.3-4.5C10.9,31.4,11.2,31.4,11.4,31.6z"/><path id="XMLID_55_" class="yellow" d="M33.2,13l0.2,0.3c0.2,0.2,0.6,0.3,0.8,0.1l5.3-4.5c0.2-0.2,0.3-0.6,0.1-0.8l-0.2-0.3 c-0.2-0.2-0.6-0.3-0.8-0.1l-5.3,4.5C33,12.4,33,12.7,33.2,13z"/><path id="XMLID_54_" class="yellow" d="M11.4,13.2l0.2-0.3c0.2-0.2,0.2-0.6-0.1-0.8L6.3,7.6C6.1,7.4,5.7,7.5,5.5,7.7L5.3,7.9 C5.1,8.2,5.1,8.5,5.4,8.7l5.3,4.5C10.9,13.5,11.2,13.5,11.4,13.2z"/><path id="XMLID_53_" class="yellow" d="M33.2,31.9l0.2-0.3c0.2-0.2,0.6-0.3,0.8-0.1l5.3,4.5c0.2,0.2,0.3,0.6,0.1,0.8l-0.2,0.3 c-0.2,0.2-0.6,0.3-0.8,0.1l-5.3-4.5C33,32.5,33,32.1,33.2,31.9z"/><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="0.5s" keyTimes="0;0.5;1" repeatCount="indefinite" values="1;0.6;1" calcMode="linear"/></g></g></svg>
    </div>

    <!-- SVG for Clear Night -->
    <div class="element clear-night">
        <!-- SVG code for Clear Night -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30.8 42.5" style="enable-background:new 0 0 30.8 42.5;" xml:space="preserve" height="40px" width="40px"><path id="Moon" class="yellow" d="M15.3,21.4C15,12.1,21.1,4.2,29.7,1.7c-2.8-1.2-5.8-1.8-9.1-1.7C8.9,0.4-0.3,10.1,0,21.9 c0.3,11.7,10.1,20.9,21.9,20.6c3.2-0.1,6.3-0.9,8.9-2.3C22.2,38.3,15.6,30.7,15.3,21.4z"/></svg>
    </div>

    <!-- SVG for Sunny with Wind -->
    <div class="element sunny-with-wind">
        <!-- SVG code for Sunny with Wind -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 45.1 47.6" style="enable-background:new 0 0 45.1 47.6;" xml:space="preserve" height="45px" width="45px"><style type="text/css">.st1{fill:none;stroke:#FFFFFF;stroke-width:2;stroke-miterlimit:10;}</style><g id="Wind_Sun"><g id="Sun_1_"><circle id="XMLID_25_" class="yellow" cx="27.1" cy="18.1" r="8.9"/><g><path id="XMLID_21_" class="yellow" d="M27.2,6.5L27.2,6.5c-0.4,0-0.6-0.3-0.6-0.6V0.6c0-0.3,0.3-0.6,0.6-0.6l0.1,0 c0.3,0,0.6,0.3,0.6,0.6v5.4C27.7,6.2,27.5,6.5,27.2,6.5z"/><path id="XMLID_18_" class="yellow" d="M27.2,29.5L27.2,29.5c-0.4,0-0.6,0.3-0.6,0.6v5.4c0,0.3,0.3,0.6,0.6,0.6h0.1 c0.3,0,0.6-0.3,0.6-0.6v-5.4C27.7,29.8,27.5,29.5,27.2,29.5z"/><path id="XMLID_17_" class="yellow" d="M15.6,18L15.6,18c0,0.4-0.3,0.6-0.6,0.6H9.7c-0.3,0-0.6-0.3-0.6-0.6V18c0-0.3,0.3-0.6,0.6-0.6 h5.4C15.4,17.4,15.6,17.7,15.6,18z"/><path id="XMLID_16_" class="yellow" d="M38.7,18L38.7,18c0,0.4,0.3,0.6,0.6,0.6h5.4c0.3,0,0.6-0.3,0.6-0.6V18c0-0.3-0.3-0.6-0.6-0.6 h-5.4C38.9,17.4,38.7,17.7,38.7,18z"/><path id="XMLID_15_" class="yellow" d="M18.4,25.5L18.4,25.5c0.2,0.3,0.2,0.6,0,0.8l-4.1,3.5c-0.2,0.2-0.6,0.2-0.8-0.1l0,0 c-0.2-0.2-0.2-0.6,0.1-0.8l4.1-3.5C17.8,25.2,18.2,25.2,18.4,25.5z"/><path id="XMLID_12_" class="yellow" d="M35.9,10.5L35.9,10.5c0.2,0.3,0.6,0.3,0.8,0.1l4.1-3.5C41,6.9,41,6.5,40.8,6.3l0,0 C40.6,6,40.2,6,40,6.2l-4.1,3.5C35.7,9.9,35.7,10.2,35.9,10.5z"/><path id="XMLID_11_" class="yellow" d="M18.4,10.5L18.4,10.5c0.2-0.3,0.2-0.6,0-0.8l-4.1-3.5C14.1,6,13.7,6,13.5,6.3l0,0 c-0.2,0.2-0.2,0.6,0.1,0.8l4.1,3.5C17.8,10.8,18.2,10.8,18.4,10.5z"/><path id="XMLID_9_" class="yellow" d="M35.9,25.5L35.9,25.5c0.2-0.3,0.6-0.3,0.8-0.1l4.1,3.5c0.2,0.2,0.3,0.6,0.1,0.8l0,0 C40.6,30,40.2,30,40,29.8l-4.1-3.5C35.7,26.1,35.7,25.8,35.9,25.5z"/><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="0.5s" keyTimes="0;0.5;1" repeatCount="indefinite" values="1;0.6;1" calcMode="linear"/></g></g><g id="Wind"><path id="XMLID_27_" class="st1" d="M1.3,33.1h19.3c2.1,0,3.8-1.3,3.8-3v0v0c0-1.7-1.7-3-3.8-3h-2.1"/><path id="XMLID_40_" class="st1" d="M2.4,42.4h18.2c2,0,3.6,0.9,3.6,2.1l0,0v0c0,1.2-1.6,2.1-3.6,2.1h-2"/><line id="XMLID_28_" class="st1" x1="5.3" y1="36.3" x2="25.5" y2="36.3"/><line id="XMLID_29_" class="st1" x1="0" y1="39.3" x2="27" y2="39.3"/><animateTransform attributeName="transform" attributeType="XML" dur="1.5s" keyTimes="0;1" repeatCount="indefinite" type="translate" values="0;3" calcMode="linear"></animateTransform><animate attributeType="CSS" attributeName="opacity" attributeType="XML" dur="1.5s" keyTimes="0;1" repeatCount="indefinite" values="0.3;0.9" calcMode="linear"/></g></g></svg>
    </div>

    <!-- SVG for Snowy -->
    <div class="element snowy">
        <!-- SVG code for Snowy -->
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 55.1 52.5" style="enable-background:new 0 0 55.1 52.5;" xml:space="preserve"><g id="Cloud_7"><g id="White_cloud_7"><path id="XMLID_8_" class="white" d="M47.2,34.5H7.9c-4.3,0-7.9-3.5-7.9-7.9l0,0c0-4.3,3.5-7.9,7.9-7.9h39.4c4.3,0,7.9,3.5,7.9,7.9 v0C55.1,30.9,51.6,34.5,47.2,34.5z"/><circle id="XMLID_5_" class="white" cx="17.4" cy="17.3" r="9.3"/><circle id="XMLID_1_" class="white" cx="34.5" cy="15.6" r="15.6"/></g><circle class="white" cx="37" cy="43.5" r="3"><animateTransform attributeName="transform" attributeType="XML" dur="1.5s" keyTimes="0;0.33;0.66;1" repeatCount="indefinite" type="translate" values="1 -2;3 2; 1 4; 2 6" calcMode="linear"></animateTransform></circle><circle class="white" cx="27" cy="43.5" r="3"><animateTransform attributeName="transform" attributeType="XML" dur="1.5s" keyTimes="0;0.33;0.66;1"repeatCount="indefinite" type="translate" values="1 -2;3 2; 1 4; 2 6" calcMode="linear"></animateTransform></circle><circle class="white" cx="17" cy="43.5" r="3"><animateTransform attributeName="transform" attributeType="XML" dur="1.5s" keyTimes="0;0.33;0.66;1" repeatCount="indefinite" type="translate" values="1 -2;3 2; 1 4; 2 6" calcMode="linear"></animateTransform></circle></g></svg>
    </div>

</body>
<script src="script.js"></script>
</html>
