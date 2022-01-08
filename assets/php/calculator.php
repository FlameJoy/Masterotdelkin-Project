<?php
  $subject = "Расчет сметы ремонта помещения";
  $renovationType = trim(strip_tags($_POST['renovationType']));
  $square = trim(strip_tags($_POST['square']));
  $buildingType = trim(strip_tags($_POST['buildingType']));
  $premiseesType = trim(strip_tags($_POST['premisesApartment']));

  // Walls
  $wallPlaster = trim(strip_tags($_POST['wallPlaster']));
  $wallDrywall = trim(strip_tags($_POST['wallDrywall']));
  $wallWallpaper = trim(strip_tags($_POST['wallWallpaper']));

  // Floors
  $floorLeveling = trim(strip_tags($_POST['floorLeveling']));
  $floorLaminate = trim(strip_tags($_POST['floorLaminate']));
  $floorTile = trim(strip_tags($_POST['floorTile']));

  // Ceilings
  $ceilingPlaster = trim(strip_tags($_POST['ceilingPlaster']));
  $ceilingDrywall = trim(strip_tags($_POST['ceilingDrywall']));
  $stretchCeiling = trim(strip_tags($_POST['stretchCeiling']));

  // Additional options
  $electrics = trim(strip_tags($_POST['electrics']));
  $waterSupplySystem = trim(strip_tags($_POST['waterSupplySystem']));
  $heatingSystem = trim(strip_tags($_POST['heatingSystem']));
  // Replace
  $replHeatingRadiators = trim(strip_tags($_POST['replHeatingRadiators']));
  $replWindows = trim(strip_tags($_POST['replWindows']));

  $doorInst = trim(strip_tags($_POST['doorInst']));
  $soundproofing = trim(strip_tags($_POST['soundproofing']));
  $material = trim(strip_tags($_POST['material']));
  if(empty($material)) {
    $material = "Нет";
  }
  

  // Email
  $email = trim(strip_tags($_POST["email"]));

  // ------------
  // Calculations
  // ------------

  // Walls
  $wallPlasterCost = 450 * (1 * $square);
  $wallDrywallCost = 400 * (1 * $square);
  $wallWallpaperCost = 250 * (1 * $square);

  if(empty($wallPlaster)) {
    $wallPlasterCost = 0;
  }
  if(empty($wallDrywall)) {
    $wallDrywallCost = 0;
  }
  if(empty($wallWallpaper)) {
    $wallWallpaperCost = 0;
  }

  $totalWallCost = $wallPlasterCost + $wallDrywallCost + $wallWallpaperCost;

  // Floors
  $floorLevelingCost = 500 * (1 * $square);
  $floorLaminateCost = 450 * (1 * $square);
  $floorTileCost = 300 * (1 * $square);

  if(empty($floorLeveling)) {
    $floorLevelingCost = 0;
  }
  if(empty($floorLaminate)) {
    $floorLaminateCost = 0;
  }
  if(empty($floorTile)) {
    $floorTileCost = 0;
  }

  $totalFloorCost = $floorLevelingCost + $floorLaminateCost + $floorTileCost;

  // Ceilings
  $ceilingPlasterCost = 500 * (1 * $square);
  $ceilingDrywallCost = 400 * (1 * $square);
  $stretchCeilingCost = 350 * (1 * $square);

  if(empty($ceilingPlaster)) {
    $ceilingPlasterCost = 0;
  }
  if(empty($ceilingDrywall)) {
    $ceilingDrywallCost = 0;
  }
  if(empty($stretchCeiling)) {
    $stretchCeilingCost = 0;
  }

  $totalCeilingCost = $ceilingPlasterCost + $ceilingDrywallCost + $stretchCeilingCost;

  // Additional options
  $electricsCost = 50000;
  $waterSupplySystemCost = 40000;
  $heatingSystemCost = 40000;
  $replHeatingRadiatorsCost = 4000 * $replHeatingRadiators;
  $replWindowsCost = 7000 * $replWindows;
  $doorInstCost = 5500;
  $soundproofingCost = 800 * (1 * $square);

  if(empty($electrics)) {
    $electricsCost = 0;
  }
  if(empty($waterSupplySystem)) {
    $waterSupplySystemCost = 0;
  }
  if(empty($heatingSystem)) {
    $heatingSystemCost = 0;
  }
  if(empty($doorInst)) {
    $doorInstCost = 0;
  }
  if(empty($soundproofing)) {
    $soundproofingCost = 0;
  }


  $totalAddOptionsCost = $electricsCost + $waterSupplySystemCost + $heatingSystemCost + $replHeatingRadiatorsCost + $replWindowsCost + $doorInstCost + $soundproofingCost;

  // Total Cost
  if($material == "Да") {
    $totalCost = ($totalWallCost + $totalFloorCost + $totalCeilingCost + $totalAddOptionsCost) * 2;
  } else if($material == "Нет") {
    $totalCost = $totalWallCost + $totalFloorCost + $totalCeilingCost + $totalAddOptionsCost;
  }
  
  // Message
  $msg = "Рассчёт сметы проекта.\n\n" 
  ."Тип ремонта: $renovationType\n\n" 
  ."Площадь объекта: $square м2 \n\n" 
  ."Вид недвижимости: $buildingType\n\n" 
  ."Тип помещения: $premiseesType\n\n" 
  ."Ремонт стен: \n" 
  ."  Выравнивание стен (штукатурка) = $wallPlasterCost руб. \n" 
  ."  Выравнивание стен (гипсокартон) = $wallDrywallCost руб. \n" 
  ."  Поклейка обоев = $wallWallpaperCost руб. \n\n" 
  ."Ремонт полов: \n" 
  ."  Выравнивание пола = $floorLevelingCost руб. \n" 
  ."  Финишное покрытие пола (ламинат) = $floorLaminateCost руб. \n" 
  ."  Финишное покрытие пола (плитка) = $floorTileCost руб. \n\n" 
  ."Ремонт потолков: \n" 
  ."  Выравнивание потолка (штукатурка) = $ceilingPlasterCost руб.\n" 
  ."  Потолки (гипсокартон) = $ceilingDrywallCost руб. \n" 
  ."  Натяжные потолки = $stretchCeilingCost руб. \n\n" 
  ."Дополнительные услуги: \n" 
  ."  Замена электрики = $electricsCost \n" 
  ."  Замена системы водоснабжения = $waterSupplySystemCost \n" 
  ."  Замена системы отопления = $heatingSystemCost \n" 
  ."  Замена или монтаж радиаторов отопления, шт = $replHeatingRadiatorsCost \n" 
  ."  Замена окон, шт = $replWindowsCost \n" 
  ."  Установка двери = $doorInstCost \n" 
  ."  Звукоизоляция стен, пола, потолка = $soundproofingCost \n" 
  ."  Материал нашей компании = $material \n\n"
  ."Итоговая стоимость: $totalCost руб. ";

  // Headers
  $headers  = 'MIME-Version: 1.0' . "\r\n"; // заголовок соответствует формату плюс символ перевода строки
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; // указывает на тип посылаемого контента

  mail($email, $subject, $msg, $headers); //отправляет получателю на емайл значения переменных
  header("Location:https://deloremontov.ru/#calc/");
?>