<?php
/*
Plugin Name: Realms Weather WordPress Widget
Plugin URI: https://www.fantasist.net/scroll/index.php/forgotten-realms-weather-widget/
Version: 1.01
Description: A simple daily weather WordPress Widget for the Forgotten Realms, specifically the city of Waterdeep, using the Third Edition Forgotten Realms Campaign setting publication year to set the Forgotten Realms year.  Icons are from https://www.deviantart.com/azuresol/art/Sketcy-Weather-Icons-Glow-ed-135079488
Author: J K Hoffman
Author URI: https://JKHoffman.com/
*/
 
class RealmsWeather_Widget extends WP_Widget
{
  function RealmsWeather_Widget()
  {
    $widget_ops = array('classname' => 'RealmsWeather_Widget', 'description' => 'Realms Weather Widget');
    $this->WP_Widget('RealmsWeather_Widget', 'Realms Weather Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args((array) $instance, array( 'title' => '' ));
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class='widefat' id='<?php echo $this->get_field_id('title'); ?>' name='<?php echo $this->get_field_name('title'); ?>' type='text' value='<?php echo attribute_escape($title); ?>' /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
    
    // Use the day of the year to get a daily changing
// quote changing (z = 0 till 365)
$DayOfTheYear = date('z'); 
 
// You could also use:
//  --> date('m'); // Quote changes every month
//  --> date('z'); // Quote changes every day
//  --> date('h'); // Quote changes every hour
//  --> date('i'); // Quote changes every minute

/*
** starting the Forgotten Realms functions
*/

function frdates($day, $month, $year){
        $today = date("d m Y", mktime(0, 0, 0, $month, $day, $year));
	$leapyear=date("L", mktime(0, 0, 0, $month, $day, $year));
	$FRYear =date("Y", mktime(0, 0, 0, $month, $day, $year))-524;
        $doy=date("z", mktime(0, 0, 0, $month, $day, $year))+1;
	if ($leapyear=1)
	  {
	   switch($doy){
	           case ($doy > 0 && $doy < 31):
	           	$Fmonth = "Hammer";
	          	$Fday = ($doy);
	          	break;
		   case 31:
	         	$Fmonth = "Midwinter ";
	         	$Fday = 0;
	         	break;
	     case ($doy > 31 && $doy < 62):
	          $Fmonth = "Alturiak";
	          $Fday = ($doy - 31);
	          break;
	     case ($doy > 61 && $doy < 92):
		        $Fmonth = "Ches";
		        $Fday = ($doy - 61);
		        break;
	     case ($doy > 91 && $doy < 122):
		        $Fmonth = "Tarkash";
		        $Fday = ($doy - 91);
		        break;
		   case 122:
		        $Fmonth = "Greengrass ";
		        $Fday = 0;
		        break;
	     case ($doy > 122 && $doy < 153):
		        $Fmonth = "Mirtul";
		        $Fday = ($doy - 122);
		        break;
	     case ($doy > 152 && $doy < 183):
		        $Fmonth = "Kythorn";
		        $Fday = ($doy - 152);
		        break;
	     case ($doy > 182 && $doy < 213):
		        $Fmonth = "Flamerule";
		        $Fday = ($doy - 182);
		        break;
	           case 213:
	                $Fmonth = "Midsummer ";
	                $Fday = 0;
	                break;
	           case 214:
	                $Fmonth = "Shieldmeet ";
	                $Fday = 0;
	                break;
	     case ($doy > 214 && $doy < 245):
	                $Fmonth = "Elesias";
	                $Fday = ($doy - 214);
	                break;
	     case ($doy > 244 && $doy < 275):
	                $Fmonth = "Eleint";
	                $Fday = ($doy - 244);	                
	                break;
	            case 275:
	                 $Fmonth = "Harvesttide ";
	                 $Fday = 0;
	                 break;
	     case ($doy > 275 && $doy < 306):
	                 $Fmonth = "Marpenoth";
	                 $Fday = ($doy - 275);
	                 break;	            
	     case ($doy > 305 && $doy < 335):
	                 $Fmonth = "Uktar";
	                 $Fday = ($doy - 305);	            
	                 break;
	            case 335:
	                 $Fmonth = "The Feast of the Moon ";
	                 $Fday = 0;
	                 break;
	     case ($doy > 335 && $doy < 367):
	                 $Fmonth = "Nightal";
	                 $Fday = ($doy - 336);
	                 break;
	            default:
	                 $Fmonth = "Error";
	                 $Fday = 0;
	           }
        }
	else
	    {
	         switch($doy){
case ($doy > 0 && $doy < 31):
	           	$Fmonth = "Hammer";
	          	$Fday = ($doy);
	          	break;
		   case 31:
	         	$Fmonth = "Midwinter ";
	         	$Fday = 0;
	         	break;
	     case ($doy > 31 && $doy < 62):
	           $Fmonth = "Alturiak";
	           $Fday = ($doy - 31);
	           break;
	     case ($doy > 61 && $doy < 92):
		        $Fmonth = "Ches";
		        $Fday = ($doy - 61);
		        break;
	     case ($doy > 91 && $doy < 122):
		        $Fmonth = "Tarkash";
		        $Fday = ($doy - 91);
		        break;
		   case 122:
		        $Fmonth = "Greengrass ";
		        $Fday = 0;
		        break;
	     case ($doy > 122 && $doy < 153):
		        $Fmonth = "Mirtul";
		        $Fday = ($doy - 122);
		        break;
	     case ($doy > 152 && $doy < 183):
		        $Fmonth = "Kythorn";
		        $Fday = ($doy - 152);
		        break;
	     case ($doy > 182 && $doy < 213):
		        $Fmonth = "Flamerule";
		        $Fday = ($doy - 182);
		        break;
	           case 213:
	                $Fmonth = "Midsummer ";
	                $Fday = 0;
	                break;
	     case ($doy > 213 && $doy < 244):
	                $Fmonth = "Elesias";
	                $Fday = ($doy - 213);
	                break;
	     case ($doy > 243 && $doy < 274):
		              $Fmonth = "Eleint";
	                $Fday = ($doy - 243);	                
	                break;
	            case 274:
	                 $Fmonth = "Harvesttide ";
	                 $Fday = 0;
	                 break;
	     case ($doy > 274 && $doy < 305):
	                 $Fmonth = "Marpenoth";
	                 $Fday = ($doy - 274);
	                 break;	            
	     case ($doy > 304 && $doy < 334):
	                 $Fmonth = "Uktar";
	                 $Fday = ($doy - 304);	            
	                 break;
	           case 334:
	                 $Fmonth = "The Feast of the Moon ";
	                 $Fday = 0;
	                 break;
	     case ($doy > 334 && $doy < 366):
	                 $Fmonth = "Nightal";
	                 $Fday = ($doy - 335);
	                 break;
	            default:
	                 $Fmonth = "Error";
	                 $Fday = 0;
	    	}
	 }
	 
	 if ($Fday>0)
	     {
	     	$frday=$Fmonth." ".nthday($Fday,$small=1).", ".$FRYear;
	     }
	  else 
	     {
	     	$frday=$Fmonth." ".$FRYear."<br>Happy Holday Feast!";
	     }

          return $frday;

}


function nthday($age,$small=0) { // proper ending for numbers, ie 2nd, 3rd, 8th
    $last_char_age = substr("$age", -1);
    switch($last_char_age) {
        case '1' :
            $th = 'st';
            break;
        case '2' :
            $th = 'nd';
            break;
        case '3' :
            $th = 'rd';
            break;
        default :
            $th = 'th';
            break;
        }
    if ($age > 10 && $age < 20) $th = 'th';
    if (0 == $small) $niceage = $age.$th;
    if (1 == $small) $niceage = $age."<sup>$th</sup>";
    return $niceage;
    }

function frseasons($day, $month, $year){
        $today = date("d m Y", mktime(0, 0, 0, $month, $day, $year));
	$leapyear=date("L", mktime(0, 0, 0, $month, $day, $year));
	$FRYear =date("Y", mktime(0, 0, 0, $month, $day, $year))-524;
        $doy=date("z", mktime(0, 0, 0, $month, $day, $year))+1;
	if ($leapyear=1)
	  {
	   switch($doy){
	           case ($doy > 0 && $doy < 31):
	           	$Fmonth = "Hammer";
	          	$Fday = ($doy);
	          	$frseason="Winter";
	          	break;
		   case 31:
	         	$Fmonth = "Midwinter ";
	         	$Fday = 0;
	         	$frseason="Winter";
	         	break;
	     case ($doy > 31 && $doy < 62):
	                $Fmonth = "Alturiak";
	                $Fday = ($doy - 31);
	                $frseason="Winter";
	                break;
	     case ($doy > 61 && $doy < 92):
		        $Fmonth = "Ches";
		        $Fday = ($doy - 61);
		        $frseason="Winter";
		        break;
	     case ($doy > 91 && $doy < 122):
		        $Fmonth = "Tarkash";
		        $Fday = ($doy - 91);
		        $frseason="Spring";
		        break;
		   case 122:
		        $Fmonth = "Greengrass ";
		        $Fday = 0;
		        $frseason="Spring";
		        break;
	     case ($doy > 122 && $doy < 153):
		        $Fmonth = "Mirtul";
		        $Fday = ($doy - 122);
		        $frseason="Spring";
		        break;
	     case ($doy > 152 && $doy < 183):
		        $Fmonth = "Kythorn";
		        $Fday = ($doy - 152);
		        $frseason="Spring";
		        break;
	     case ($doy > 182 && $doy < 213):
		        $Fmonth = "Flamerule";
		        $Fday = ($doy - 182);
		        $frseason="Summer";
		        break;
	     case 213:
	          $Fmonth = "Midsummer ";
	          $Fday = 0;
	          $frseason="Summer";
	          break;
	     case 214:
           $Fmonth = "Shieldmeet ";
	         $Fday = 0;
	         $frseason="Summer";
	         break;
	     case ($doy > 214 && $doy < 245):
	                $Fmonth = "Elesias";
	                $Fday = ($doy - 214);
	                $frseason="Summer";
	                break;
	     case ($doy > 244 && $doy < 275):
	                $Fmonth = "Eleint";
	                $Fday = ($doy - 244);	
	                $frseason="Summer";                
	                break;
	            case 275:
	                 $Fmonth = "Harvesttide ";
	                 $Fday = 0;
	                 $frseason="Fall";
	                 break;
	     case ($doy > 275 && $doy < 306):
	                 $Fmonth = "Marpenoth";
	                 $Fday = ($doy - 275);
	                 $frseason="Fall";
	                 break;	            
	     case ($doy > 305 && $doy < 335):
	                 $Fmonth = "Uktar";
	                 $Fday = ($doy - 305);	
	                 $frseason="Fall";            
	                 break;
	            case 335:
	                 $Fmonth = "The Feast of the Moon ";
	                 $Fday = 0;
	                 $frseason="Fall";
	                 break;
	     case ($doy > 335 && $doy < 367):
	                 $Fmonth = "Nightal";
	                 $Fday = ($doy - 336);
	                 $frseason="Fall";
	                 break;
	            default:
	                 $Fmonth = "Error";
	                 $Fday = 0;
	           }
        }
	else
	    {
	         switch($doy){
       case ($doy > 0 && $doy < 31):
	           	$Fmonth = "Hammer";
	          	$Fday = ($doy);
	          	$frseason="Winter"; 
	          	break;
		   case 31:
	         	$Fmonth = "Midwinter ";
	         	$Fday = 0;
	         	$frseason="Winter"; 
	         	break;
	     case ($doy > 31 && $doy < 62):
	                $Fmonth = "Alturiak";
	                $Fday = ($doy - 31);
	                $frseason="Winter"; 
	                break;
	     case ($doy > 61 && $doy < 92):
		        $Fmonth = "Ches";
		        $Fday = ($doy - 61);
		        $frseason="Winter"; 
		        break;
	     case ($doy > 91 && $doy < 122):
		        $Fmonth = "Tarkash";
		        $Fday = ($doy - 91);
		        $frseason="Spring"; 
		        break;
		   case 122:
		        $Fmonth = "Greengrass ";
		        $Fday = 0;
		        $frseason="Spring"; 
		        break;
	     case ($doy > 122 && $doy < 153):
		        $Fmonth = "Mirtul";
		        $Fday = ($doy - 122);
		        $frseason="Spring"; 
		        break;
	     case ($doy > 152 && $doy < 183):
		        $Fmonth = "Kythorn";
		        $Fday = ($doy - 152);
		        $frseason="Spring"; 
		        break;
	     case ($doy > 182 && $doy < 213):
		        $Fmonth = "Flamerule";
		        $Fday = ($doy - 182);
		        $frseason="Summer"; 
		        break;
	           case 213:
	                $Fmonth = "Midsummer ";
	                $Fday = 0;
	                $frseason="Summer"; 
	                break;
	     case ($doy > 213 && $doy < 244):
	                $Fmonth = "Elesias";
	                $Fday = ($doy - 213);
	                $frseason="Summer"; 
	                break;
	     case ($doy > 243 && $doy < 274):
		               $Fmonth = "Eleint";
	                 $Fday = ($doy - 243);	
	                 $frseason="Summer";                
	                 break;
	          case 274:
	          $Fmonth = "Harvesttide ";
	          $Fday = 0;
	          $frseason="Fall";
	          break;
	     case ($doy > 274 && $doy < 305):
	                 $Fmonth = "Marpenoth";
	                 $Fday = ($doy - 274);
	                 $frseason="Fall";
	                 break;	            
	     case ($doy > 304 && $doy < 334):
	                 $Fmonth = "Uktar";
	                 $Fday = ($doy - 304);	 
	                 $frseason="Fall";           
	                 break;
	            case 334:
	                 $Fmonth = "The Feast of the Moon ";
	                 $Fday = 0;
	                 $frseason="Fall";
	                 break;
	     case ($doy > 334 && $doy < 366):
	                 $Fmonth = "Nightal";
	                 $Fday = ($doy - 335);
	                 $frseason="Fall";
	                 break;
	            default:
	                 $Fmonth = "Error";
	                 $Fday = 0;
	    	}
	 }
	 
	 if ($Fday>0)
	     {
	     	$frcurrentseason = $frseason;
	     }
	  else 
	     {
	     	$frcurrentseason = $frseason;
	     }

          return $frcurrentseason;

}
 
function RandomWeatherByInterval($TimeBase, $WeatherArray){
 
    // Make sure it is a integer
    $TimeBase = intval($TimeBase);
 
    // How many items are in the array?
    $ItemCount = count($WeatherArray);
 
    // By using the modulus operator we get a pseudo
    // random index position that is between zero and the
    // maximal value (ItemCount)
    $RandomIndexPos = ($TimeBase % $ItemCount);
 
    // Now return the random array element
    return $WeatherArray[$RandomIndexPos];
}

function daily_weather($daily_timebase) {
	
	// Make sure it is a integer
   $daily_timebase = intval($daily_timebase);
   
   $RandomWinter = array(
    "Chilly and Breezy with Clear Skies and Sun",
    "Cold, Clear and Windy",
    "Cold, Cloudy and Breezy with Light Snow",
    "Cold, Cloudy and Breezy with Snow",
    "Cold and Cloudy with Light Snow",
    "Cold and Cloudy with Heavy Snow",
    "Cold and Hazy with some Fog",
    "Cold and Overcast with Light Snow",
    "Frigid and Cloudy with Light Snow and Breezy",
    "Frigid and Cloudy with Snow and Windy",
    "Frigid and Stormy with Dark Clouds and hail",
    "Frigid, with Dark Clouds but No Snow",
    "Cold, with Dark Clouds but No Snow",
    "Blizzard!"
);
$RandomSpring = array(
     "Chilly and Breezy, with Clouds and the Occasional Downpour",
     "Chilly and Windy, with Clouds and the Occasional Downpour",
     "Cold and Stormy, with Thunderheads and Pouring Rain",
     "Hot, Humid and Sunny",
     "Mild, Clear and Windy ",
     "Mild, Overcast with some Drizzle",
     "Mild, Overcast with some Light Showers",
     "Mild and Breezy with Clear Skies and Sun",
     "Warm and Breezy with Clear Skies and Sun",
     "Warm, Humid and Sunny",
     "Warm and Windy, with Clouds and scattered Storms",
     "Hot, Humid and Hazy",
     "Warm, Humid and Hazy"
);
$RandomSummer = array(
    "Hot, Clear and Breezy",
    "Hot, Hazy and Humid",
    "Hot, Sunny and Humid",
    "Hot with Dark Clouds, and Rain, Sometimes Heavy",
    "Mild, Clear and Breezy",
    "Mild, Clear and Windy",
    "Mild, Sunny and Breezy",
    "Warm, Clear and Breezy",
    "Warm and Clear",
    "Warm, Sunny and Humid",
    "Warm, with Dark Clouds and Humid",
    "Sweltering, still and Sunny",
    "Dark Clouds and Heavy Rain",
    "Warm and Overcast with Thunderstorms"
);
$RandomFall = array(
     "Chilly, Clear and Windy",
     "Chilly and Cloudy with Showers and Windy",
     "Chilly, Hazy and Foggy",
     "Chilly, Overcast and Breezy with Snow flurries",
     "Cold, with Dark Clouds and Storms becoming Snow",
     "Hot, Clear and Breezy",
     "Mild and Breezy, with Clouds and Light Showers",
     "Mild, Hazy and Foggy",
     "Warm, Clear and Breezy",
     "Warm, Hazy and Humid",
     "Dark Clouds, and Rain, becoming Freezing Rain",
     "Chilly, with Dark Clouds and Overcast"
);
   $RW_icon_url = get_settings('siteurl')."/wp-content/plugins/RealmsWeatherWidget/icons/";
   //$RW_icon_url = plugins_url('../icons/', __FILE__) ;
   if (frseasons(date("d"), date("m"), date("Y")) == "Winter") { 
   $winter_out = RandomWeatherByInterval($daily_timebase, $RandomWinter);
   switch($winter_out){
    case "Chilly and Breezy with Clear Skies and Sun":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Cold, Clear and Windy":
    $RW_Icon = $RW_icon_url.'WindyClear.png';
	         break;
    case "Cold, Cloudy and Breezy with Light Snow":
    $RW_Icon = $RW_icon_url.'LightSnow.png';
	         break;
    case "Cold, Cloudy and Breezy with Snow":
    $RW_Icon = $RW_icon_url.'Snow.png';
	         break;
    case "Cold and Cloudy with Light Snow":
    $RW_Icon = $RW_icon_url.'LightSnow.png';
	         break;
    case "Cold and Cloudy with Heavy Snow":
    $RW_Icon = $RW_icon_url.'HeavySnow.png';
	         break;    
    case "Cold and Hazy with some Fog":
    $RW_Icon = $RW_icon_url.'Haze.png';
	         break;    
    case "Cold and Overcast with Light Snow":
    $RW_Icon = $RW_icon_url.'LightSnow.png';
	         break;    
    case "Frigid and Cloudy with Light Snow and Breezy":
    $RW_Icon = $RW_icon_url.'LightSnow.png';
	         break;    
    case "Frigid and Cloudy with Snow and Windy":
    $RW_Icon = $RW_icon_url.'Snow.png';
	         break;    
    case "Frigid and Stormy with Dark Clouds and hail":
    $RW_Icon = $RW_icon_url.'Hail.png';
	         break;    
    case "Frigid, with Dark Clouds but No Snow":
    $RW_Icon = $RW_icon_url.'Frigid.png';
	         break;    
    case "Cold, with Dark Clouds but No Snow":
    $RW_Icon = $RW_icon_url.'Cloudy.png';
	         break;    
    case "Blizzard!":
    $RW_Icon = $RW_icon_url.'Blizzard.png';
	         break;
 } 
   echo "<center><strong><img src='$RW_Icon' style='background-color:RoyalBlue;width:100px;height:100px'> <br/>";
   echo " ". $winter_out . " on this Winter day.</strong></center><br/>";
   } elseif (frseasons(date("d"), date("m"), date("Y")) == "Spring") { 
   	$spring_out = RandomWeatherByInterval($daily_timebase, $RandomSpring);
   	switch($spring_out){
    case "Chilly and Breezy, with Clouds and the Occasional Downpour":
    $RW_Icon = $RW_icon_url.'ScatteredShowers.png';
	         break;
    case "Chilly and Windy, with Clouds and the Occasional Downpour":
    $RW_Icon = $RW_icon_url.'ScatteredShowers.png';
	         break;
    case "Cold and Stormy, with Thunderheads and Pouring Rain":
    $RW_Icon = $RW_icon_url.'Thunderstorm.png';
	         break;
    case "Hot, Humid and Sunny":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Mild, Clear and Windy ":
    $RW_Icon = $RW_icon_url.'WindyClear.png';
	         break;
    case "Mild, Overcast with some Drizzle":
    $RW_Icon = $RW_icon_url.'Drizzle.png';
	         break;
    case "Mild, Overcast with some Light Showers":
    $RW_Icon = $RW_icon_url.'LightRain.png';
	         break;
    case "Mild and Breezy with Clear Skies and Sun":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Warm and Breezy with Clear Skies and Sun":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Warm, Humid and Sunny":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Warm and Windy, with Clouds and scattered Storms":
    $RW_Icon = $RW_icon_url.'ScatteredThunderstorms.png';
	         break;
    case "Hot, Humid and Hazy":
    $RW_Icon = $RW_icon_url.'Hot.png';
	         break;
    case "Warm, Humid and Hazy":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
}
   echo "<center><strong><img src='$RW_Icon' style='background-color:RoyalBlue;width:100px;height:100px'> <br/>";
   echo " ". $spring_out . " on this Spring day.</strong></center><br/>";
   } elseif (frseasons(date("d"), date("m"), date("Y")) == "Summer") { 
   $summer_out = RandomWeatherByInterval($daily_timebase, $RandomSummer);
   switch($summer_out){
    case "Hot, Clear and Breezy":
    $RW_Icon = $RW_icon_url.'WindyClear.png';
	         break;
    case "Hot, Hazy and Humid":
    $RW_Icon = $RW_icon_url.'Hot.png';
	         break;
    case "Hot, Sunny and Humid":
    $RW_Icon = $RW_icon_url.'Hot.png';
	         break;
    case "Hot with Dark Clouds, and Rain, Sometimes Heavy":
    $RW_Icon = $RW_icon_url.'Rain.png';
	         break;
    case "Mild, Clear and Breezy":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Mild, Clear and Windy":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Mild, Sunny and Breezy":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Warm, Clear and Breezy":
    $RW_Icon = $RW_icon_url.'Windy.png';
	         break;
    case "Warm and Clear":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Warm, Sunny and Humid":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
    case "Warm, with Dark Clouds and Humid":
    $RW_Icon = $RW_icon_url.'Cloudy.png';
	         break;
    case "Sweltering, still and Sunny":
    $RW_Icon = $RW_icon_url.'Hot.png';
	         break;
    case "Dark Clouds and Heavy Rain":
    $RW_Icon = $RW_icon_url.'HeavyRain.png';
	         break;
    case "Warm and Overcast with Thunderstorms":
    $RW_Icon = $RW_icon_url.'Thunderstorm.png';
	         break;
}
   echo "<center><strong><img src='$RW_Icon' style='background-color:RoyalBlue;width:100px;height:100px'> <br/>";
   echo " ". $summer_out . " on this Summer day.</strong></center><br/>";
   } else { 
   	$fall_out = RandomWeatherByInterval($daily_timebase, $RandomFall);
   	switch($fall_out){
    case "Chilly, Clear and Windy":
    $RW_Icon = $RW_icon_url.'WindyClear.png';
	         break;
     case "Chilly and Cloudy with Showers and Windy":
    $RW_Icon = $RW_icon_url.'ScatteredShowers.png';
	         break;
     case "Chilly, Hazy and Foggy":
    $RW_Icon = $RW_icon_url.'Fog.png';
	         break;
     case "Chilly, Overcast and Breezy with Snow flurries":
    $RW_Icon = $RW_icon_url.'LightSnow.png';
	         break;
     case "Cold, with Dark Clouds and Storms becoming Snow":
    $RW_Icon = $RW_icon_url.'FreezingRain.png';
	         break;
     case "Hot, Clear and Breezy":
    $RW_Icon = $RW_icon_url.'Sunny.png';
	         break;
     case "Mild and Breezy, with Clouds and Light Showers":
    $RW_Icon = $RW_icon_url.'LightRain.png';
	         break;
     case "Mild, Hazy and Foggy":
    $RW_Icon = $RW_icon_url.'Fog.png';
	         break;
     case "Warm, Clear and Breezy":
    $RW_Icon = $RW_icon_url.'WindyClear.png';
	         break;
     case "Warm, Hazy and Humid":
    $RW_Icon = $RW_icon_url.'Haze.png';
	         break;
     case "Dark Clouds, and Rain, becoming Freezing Rain":
    $RW_Icon = $RW_icon_url.'FreezingRain.png';
	         break;
     case "Chilly, with Dark Clouds and Overcast":
    $RW_Icon = $RW_icon_url.'Cloudy.png';
	         break;
  }
   echo "<center><strong><img src='$RW_Icon' style='background-color:RoyalBlue;width:100px;height:100px'> <br/>";
   echo " ". $fall_out . " on this Fall day. </strong></center><br/>";
   } 

        }
    if (!empty($title))
      echo $before_title . $title . $after_title;
 
    // Do Your Widgety Stuff Here...
    echo "<center><h4>Today's weather in </h4><h3>Waterdeep</h3></center>";
    //echo "The time is " . date("h:i:sa");
    echo "<center><strong> Today is ". frdates(date("d"), date("m"), date("Y"))."</strong></center>";
    //echo "And, it is ". frseasons(date("d"), date("m"), date("Y"))."<br/>";
    //echo "<br>";
    return daily_weather($DayOfTheYear);
    echo $after_widget;
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("RealmsWeather_Widget");') );

//This should allow short code for the widget
add_shortcode('RealmsWeather','widget');

?>