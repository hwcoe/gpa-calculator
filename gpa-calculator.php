<?php
/*
Plugin Name: GPA Calculator
Description: Allows UF Students to calculate GPA using both pre-2009 and post-2009 grading schemes.
Version: 1.2
License: GPL
Author: Herbert Wertheim College of Engineering - Sarah Zachrich Jeng
Author URI: http://www.eng.ufl.edu
*/

function calculator_shortcode() {
	// Registering the scripts
	wp_register_script('gpa-calculator-js', plugins_url('js/gpa_calculator.js', __FILE__ ), '', '', false);
	wp_enqueue_script('gpa-calculator-js');
	wp_register_script('gpa-calculator-init', plugins_url('js/gpa_calculator_init.js', __FILE__ ), '', '', false);
	wp_enqueue_script('gpa-calculator-init');

	$calculator = <<<EOD
		<form style="margin: 0px;" method="post">
			<table>
				<caption class="hidden">Calculate GPA</caption>
				<thead>
					<tr>
						<th rowspan="2" style="text-align:center"># of Credits</th>
						<th rowspan="1" colspan="2" style="width:180px; text-align:center">Grades for courses taken:</th>
						<th rowspan="2" style="text-align:center">Grade Points</th>
						<th rowspan="2" colspan="2" style="width:180px; text-align:center">Calculate</th>
					</tr>
					<tr>
						<th style="text-align:center">Before Summer '09</th>
						<th style="text-align:center">As of Summer '09</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr>
						<td><input type="text" name="units" size="7" maxlength="4" /></td>
						<td><input type="text" name="gradePre" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradePost" size="7" maxlength="2" /></td>
						<td><input type="text" name="gradepoints" size="7" /></td>
						<td class="calcButton"><input name="calculate" type="button" value="Compute" /></td>
						<td class="calcButton"><input name="reset" type="button" value="Reset" /></td>
					</tr>
					<tr class="callout">
						<th style="text-align:center">
							Total # of<br />
							Credits
						</th>
						<th style="text-align:center">
							Grade Point<br />
							Average
						</th>
						<th style="text-align:center">
							Deficit<br />
							Points
						</th>
						<th style="text-align:center">
							Total Grade<br />
							Points
						</th>
						<th colspan="2" style="width:180px; text-align:center">
							Calculate
						</th>
					</tr>
					<tr>
						<td><input type="text" name="totalUnits" id="TotalCredits" size="7" maxlength="4" /></td>
						<td><input name="grade" id="TotalGPA" type="text" size="7" /></td>
						<td><input id="DeficitPoints" type="text" size="7" /></td>
						<td><input type="text" id="TotalPointsEarned" name="totalGradePoints" size="7" /></td>
						<td><input type="button" value="Compute" onclick="javascript:SumForm();" /></td>
						<td><input type="button" name="resetTotal" value="Reset" onclick="javascript:ResetTotals();" /></td>
					</tr>
				</tbody>
			</table>
		</form>
EOD;

	return $calculator;
}

add_shortcode('gpa_calculator', 'calculator_shortcode');

				
?>