<?php defined('BASEPATH') or exit('No direct script access allowed');

class Taxcalculatorlib
{
    private $SALARY_BASIC_RATIO = 0.50;
    private $SALARY_HR_RATIO = 0.25;
    private $SALARY_CONV_RATIO = 0.15;
    private $SALARY_MED_RATIO = 0.10;

    private $TAX_SLAP_ONE_AMOUNT_MALE = 300000;
    private $TAX_SLAP_ONE_AMOUNT_FEMALE = 350000;
    private $TAX_SLAP_ONE_RATIO = 0;
    private $TAX_SLAP_TWO_AMOUNT = 100000;
    private $TAX_SLAP_TWO_RATIO = 0.05;
    private $TAX_SLAP_THREE_AMOUNT = 300000;
    private $TAX_SLAP_THREE_RATIO = 0.1;
    private $TAX_SLAP_FOUR_AMOUNT = 400000;
    private $TAX_SLAP_FOUR_RATIO = 0.15;
    private $TAX_SLAP_FIVE_AMOUNT = 500000;
    private $TAX_SLAP_FIVE_RATIO = 0.2;
    private $TAX_SLAP_SIX_RATIO = 0.25;


    /**
    *	Total Salary breakdown from list of salary every month
    *	Breaks the salary into Basic, HR, Conv, Medical
    **/
    public function salaryBreakDownArray($monthlySalarys)
    {
        $salaryTotal = 0;
        foreach ($monthlySalarys as $salary) {
            $salaryTotal+= $salary;
        }
        $taxcaldata['yearlyGrossSalary'] = $salaryTotal;
        $taxcaldata['basicSalary'] = $salaryTotal * $this->SALARY_BASIC_RATIO;
        $taxcaldata['houseRent'] = $salaryTotal * $this->SALARY_HR_RATIO;
        $taxcaldata['totalConveyence'] = $salaryTotal * $this->SALARY_CONV_RATIO;
        $taxcaldata['medicalAllowance'] = $salaryTotal * $this->SALARY_MED_RATIO;

        return $taxcaldata;
    }

    /**
    *	Total Salary breakdown
    *	Breaks the salary into Basic, HR, Conv, Medical
    **/

    public function salaryBreakDown($monthlySalaryTotal, $bonus = 0)
    {
        $salaryTotal = $monthlySalaryTotal * 12;
        $taxcaldata['yearlyGrossSalary'] = $salaryTotal;
        $taxcaldata['basicSalary'] = $salaryTotal * $this->SALARY_BASIC_RATIO;
        $taxcaldata['houseRent'] = $salaryTotal * $this->SALARY_HR_RATIO;
        $taxcaldata['totalConveyence'] = $salaryTotal * $this->SALARY_CONV_RATIO;
        $taxcaldata['medicalAllowance'] = $salaryTotal * $this->SALARY_MED_RATIO;
        $taxcaldata['bonusTaxable'] = $bonus;

        return $taxcaldata;
    }


    /**
    *	Total Salary breakdown without bonus
    *	Breaks the salary into Basic, HR, Conv, Medical
    **/
//    public function salaryBreakDown($monthlySalaryTotal)
//    {
//        $salaryTotal = $monthlySalaryTotal * 12;
//        $taxcaldata['yearlyGrossSalary'] = $salaryTotal;
//        $taxcaldata['basicSalary'] = $salaryTotal * $this->SALARY_BASIC_RATIO;
//        $taxcaldata['houseRent'] = $salaryTotal * $this->SALARY_HR_RATIO;
//        $taxcaldata['totalConveyence'] = $salaryTotal * $this->SALARY_CONV_RATIO;
//        $taxcaldata['medicalAllowance'] = $salaryTotal * $this->SALARY_MED_RATIO;
//
//        return $taxcaldata;
//    }

    /**
    *	Taxable Income from the salary breakdown
    *	Calculate the total taxable income
    **/
    public function salaryTaxableIncome($salaryBreakDown)
    {
        $taxcaldata = $salaryBreakDown;
        $taxcaldata['basicSalaryTaxable'] = $taxcaldata['basicSalary'];
        $taxcaldata['houseRentTaxable'] = $taxcaldata['houseRent'] - min($taxcaldata['basicSalary']*0.5, $taxcaldata['houseRent'], 300000);
        $taxcaldata['conveyenceTaxable'] = $taxcaldata['totalConveyence'] - min(30000, $taxcaldata['totalConveyence']);
        $taxcaldata['medicalAllowanceTaxable'] = $taxcaldata['medicalAllowance'] - min($taxcaldata['basicSalary']*0.1, $taxcaldata['medicalAllowance'], 120000);
        $taxcaldata['bonusTaxable'] = $taxcaldata['bonusTaxable'] + $taxcaldata['basicSalary'] / 12 * 2;
        $taxcaldata['totalTaxableIncome'] = $taxcaldata['basicSalaryTaxable'] + $taxcaldata['houseRentTaxable'] + $taxcaldata['conveyenceTaxable'] + $taxcaldata['medicalAllowanceTaxable'] + $taxcaldata['bonusTaxable'];
        $taxcaldata['investmentLimit'] = $taxcaldata['totalTaxableIncome'] * 0.25;

        return $taxcaldata;
    }

    /**
    *	Taxable Income from the salary breakdown
    *	Calculate the total taxable income
    **/
    public function salaryTaxCalculation($taxableIncome, $gender)
    {
        $taxcaldata = $taxableIncome;
        $totalTaxableIncome = $taxcaldata['totalTaxableIncome'];

        $taxcaldata['taxSlapTwoAmount'] = 0;
        $taxcaldata['taxSlapThreeAmount'] = 0;
        $taxcaldata['taxSlapFourAmount'] = 0;
        $taxcaldata['taxSlapFiveAmount'] = 0;
        $taxcaldata['taxSlapSixAmount'] = 0;

        if ($gender == 'Male') {
            if ($totalTaxableIncome >= $this->TAX_SLAP_ONE_AMOUNT_MALE) {
                $taxcaldata['taxSlapOneAmount'] = $this->TAX_SLAP_ONE_AMOUNT_MALE;
                $totalTaxableIncome = $totalTaxableIncome - $this->TAX_SLAP_ONE_AMOUNT_MALE;
            } else {
                $taxcaldata['taxSlapOneAmount'] = $totalTaxableIncome;
                $totalTaxableIncome = 0;
            }
        } elseif ($gender == 'Female') {
            if ($totalTaxableIncome >= $this->TAX_SLAP_ONE_AMOUNT_FEMALE) {
                $taxcaldata['taxSlapOneAmount'] = $this->TAX_SLAP_ONE_AMOUNT_FEMALE;
                $totalTaxableIncome = $totalTaxableIncome - $this->TAX_SLAP_ONE_AMOUNT_FEMALE;
            } else {
                $taxcaldata['taxSlapOneAmount'] = $totalTaxableIncome;
                $totalTaxableIncome = 0;
            }
        }

        if ($totalTaxableIncome >= $this->TAX_SLAP_TWO_AMOUNT) {
            $taxcaldata['taxSlapTwoAmount'] = $this->TAX_SLAP_TWO_AMOUNT;
            $totalTaxableIncome = $totalTaxableIncome - $this->TAX_SLAP_TWO_AMOUNT;
        } else {
            $taxcaldata['taxSlapTwoAmount'] = $totalTaxableIncome;
            $totalTaxableIncome = 0;
        }

        if ($totalTaxableIncome >= $this->TAX_SLAP_THREE_AMOUNT) {
            $taxcaldata['taxSlapThreeAmount'] = $this->TAX_SLAP_THREE_AMOUNT;
            $totalTaxableIncome = $totalTaxableIncome - $this->TAX_SLAP_THREE_AMOUNT;
        } else {
            $taxcaldata['taxSlapThreeAmount'] = $totalTaxableIncome;
            $totalTaxableIncome = 0;
        }

        if ($totalTaxableIncome >= $this->TAX_SLAP_FOUR_AMOUNT) {
            $taxcaldata['taxSlapFourAmount'] = $this->TAX_SLAP_FOUR_AMOUNT;
            $totalTaxableIncome = $totalTaxableIncome - $this->TAX_SLAP_FOUR_AMOUNT;
        } else {
            $taxcaldata['taxSlapFourAmount'] = $totalTaxableIncome;
            $totalTaxableIncome = 0;
        }

        if ($totalTaxableIncome >= $this->TAX_SLAP_FIVE_AMOUNT) {
            $taxcaldata['taxSlapFiveAmount'] = $this->TAX_SLAP_FIVE_AMOUNT;
            $totalTaxableIncome = $totalTaxableIncome - $this->TAX_SLAP_FIVE_AMOUNT;
        } else {
            $taxcaldata['taxSlapFiveAmount'] = $totalTaxableIncome;
            $totalTaxableIncome = 0;
        }

        if ($totalTaxableIncome > 0) {
            $taxcaldata['taxSlapSixAmount'] = $totalTaxableIncome;
        }

        $taxcaldata['grossTaxLiability'] = $taxcaldata['taxSlapOneAmount']*$this->TAX_SLAP_ONE_RATIO + $taxcaldata['taxSlapTwoAmount']*$this->TAX_SLAP_TWO_RATIO
                      + $taxcaldata['taxSlapThreeAmount']*$this->TAX_SLAP_THREE_RATIO + $taxcaldata['taxSlapFourAmount']*$this->TAX_SLAP_FOUR_RATIO
                      + $taxcaldata['taxSlapFiveAmount']*$this->TAX_SLAP_FIVE_RATIO + $taxcaldata['taxSlapSixAmount']*$this->TAX_SLAP_SIX_RATIO;

        if ($totalTaxableIncome > 1500000) {
            $taxcaldata['taxRebateOnInvestment'] = $taxcaldata['investmentLimit'] * 0.1;
        } else {
            $taxcaldata['taxRebateOnInvestment'] = $taxcaldata['investmentLimit'] * 0.15;
        }

        if ($taxcaldata['grossTaxLiability']>0) {
            $taxcaldata['netTaxLiability'] = max($taxcaldata['grossTaxLiability']-$taxcaldata['taxRebateOnInvestment'], 5000);
        } else {
            $taxcaldata['netTaxLiability'] = 0;
        }

        $taxcaldata['monthlyTDS'] = ceil($taxcaldata['netTaxLiability']/12);

        return $taxcaldata;
    }

    public function numberTowords(float $amount)
    {
        $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
        // Check if there is any number after decimal
        $amt_hundred = null;
        $count_length = strlen($num);
        $x = 0;
        $string = array();
        $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
        $here_digits = array('','Hundred','Thousand','Lakh', 'Crore');
        while ($x < $count_length) {
            $get_divider = ($x == 2) ? 10 : 100;
            $amount = floor($num % $get_divider);
            $num = floor($num / $get_divider);
            $x += $get_divider == 10 ? 1 : 2;
            if ($amount) {
                $add_plural = (($counter = count($string)) && $amount > 9) ? ' ' : null;
                $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
                $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.'
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. '
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
            } else {
                $string[] = null;
            }
        }
        $implode_to_Rupees = implode('', array_reverse($string));
        $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . "
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
        return ($implode_to_Rupees ? $implode_to_Rupees . 'Taka Only' : '') . $get_paise;
    }
}
