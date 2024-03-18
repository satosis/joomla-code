<?php
defined('_JEXEC') or die;

$start_year     = $params->get('year_int'); //year
$start_weight   = $params->get('starting_weight');   //kg
$start_height   = $params->get('initial_rise');  // cm
$sex            = $params->get('bmi_gender');
$year_of_birth  = $params->get('bmi_year_of_birth');
$article_BMI    = $params->get('article_bmi');
$consultation_url    = $params->get('consultation_url');

$final_year_int = $params->get('final_year_int');
$for_i_year     = $final_year_int - $start_year;

$final_weight   = $params->get('final_weight');
$for_i_weight   = $final_weight - $start_weight;

$final_growth   = $params->get('final_growth');
$for_i_rise     =  ($final_growth - $start_height) / 2;
?>
<script>
var consultation_url = "<?php echo $consultation_url; ?>";
</script>

<div class="uk-grid uk-container-center uk-flex-center" style="margin-top: 150px; margin-bottom: 82px;">
<div class="uk-width-medium-2-10 uk-hidden-small" style="background-image: url(/templates/your-fitness/images/background-bg/background-bg-5.jpg);
    background-repeat: no-repeat;
    background-size: contain;
    background-position: bottom;
    z-index: -1 !important;">

</div>
<div class="uk-grid-width-medium-4-10 uk-grid-width-small-4-10 uk-grid-width-large-4-10 uk-grid-width-xlarge-4-10" style="padding-top: 15px;">
    <div class="tt-border-form-home2">
    <form>
  
        <h3 class="header-text">BMI calculator</h3>
        <a href="<?php echo $article_BMI; ?>" target="_blank" style="text-decoration: none;">
        <h4 class="bmi-link">all about BMI</h4>
        </a>
<?php 
                                       
    if ($sex == "1"){
        echo '
                    <input type="radio" id="r1"  name="sex" value="1" checked="checked"/> 
                    <label for="r1" style="float: left; margin-right: 60px;">
                    <span style="margin-right: 14px;"></span><p style="font-family: \'Roboto\'; font-weight: 100; font-size: 19px; margin-top: 4px; float: right;">Female</p></label>

                    <input type="radio" id="r2" name="sex" value="2" style="float: left;"/>
                    <label for="r2" style="float: left;">
                    <span style="margin-right: 14px;"></span><p style="font-family: \'Roboto\'; font-weight: 100; font-size: 19px; margin-top: 4px; float: right;">Male</p></label>
                    ';
    }
       
    if ($year_of_birth == "1"){     
        echo '<select name="year_birthday" class="select year_birthday">
              <option value="0">Birthday</option>';

        for ($i = 0; $i <= $for_i_year; $i++){
            $result = $start_year +$i;
            echo '<option value="'.$result.'">'.$result.'</option>';
        }
        echo '</select>';
    }

    echo '<select name="weight" class="select_to weight-bmi" style="margin-top: 9px"> 
          <option value="0">Weight</option>'; 
        
        for ($i = 0; $i <= $for_i_weight; $i++){
            $result = $start_weight +$i;
            echo '<option value="'.$result.'">'.$result.' kg</option>';
        }

    echo  '</select>
           <select name="height" class="select_to height"> 
           <option value="0">Height</option>';
    
        for ($i = 0; $i <= $for_i_rise; $i++){
            $result = $start_height + $i + $i;
            echo '<option value="'.$result.'">'.$result.' cm</option>';
        }
?>
        </select> 
        <input type="submit" class="ak-bmicalc-submit" value="calculate"/>
    </form>
   </div>

</div>
<div class="ak-bmi-result uk-grid-width-medium-4-10" style="padding-bottom: 25px;"></div>
</div> 

