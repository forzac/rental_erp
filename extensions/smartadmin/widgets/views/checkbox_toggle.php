<?php
/**
 * Created by PhpStorm.
 * User: Denis
 * Date: 09.11.2016
 * Time: 10:25
 */

if (isset($model)) {
    echo "<label class=\"toggle\">
						<input type=\"checkbox\" name=\"{$model}\" checked=\"checked\">
						<i data-swchon-text=\"ON\" data-swchoff-text=\"OFF\"></i>
				  </label>
				  ";
} else {
    echo "<form class='form-horizontal'>
                      <label class=\"toggle\">{$labelValue}
					      <input type=\"checkbox\" name=\"{$name}\" checked=\"checked\">
						  <i data-swchon-text=\"ON\" data-swchoff-text=\"OFF\"></i>
					  </label>
			      </form>
			      ";
}

?>