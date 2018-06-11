@extends('layouts.plain')

@section('content')

    <div class="container mt-5">

        <form action="">

            <div class="form-group">
                <input type="number" class="form-control" placeholder="Monthly Salary" id="monthly-salary">
            </div>
            <div class="form-group">
                <h3>Monthly Deductions</h3>
                <label for="sss">SSS</label>
                <input type="text" disabled class="form-control" placeholder="" id="sss"><br>
                <label for="pagibig">Pag-IBIG</label>
                <input type="text" disabled class="form-control" placeholder="" id="pagibig"><br>
                <label for="philhealth">PhilHealth</label>
                <input type="text" disabled class="form-control" placeholder="" id="philhealth"><br>
            </div>
            <div class="form-group">
                <h3>Monthly Income Tax</h3>
                <input type="text" disabled class="form-control" placeholder="Monthly Income Tax" id="monthly-income-tax">
            </div>

        </form>

    </div>

    <script>
    
        var MI = 15000.00; //   Monthly Income
        var AB = 90000; //  Annual Benefits

        var SSS = 0;
        var PhilHealth = 0;
        var Pag_IBIG = 0;
        var taxable_income = 0;
        var annual_tax = 0;
    
        jQuery(document).ready(function() {
            MI = jQuery('#monthly-salary').val();

            jQuery('#monthly-salary').keypress(function(e) {
                if(e.which == 13) {
                    MI = parseFloat(jQuery(this).val());
                    SSS = computeSSS(MI);
                    PhilHealth = computePhilhealth(MI);
                    Pag_IBIG = computePagibig(MI);
                    taxable_income = computeTaxableIncome(MI);

                    if(taxable_income >= 250001 && taxable_income <= 400000)
                        annual_tax = (taxable_income - 250000) * 0.2;
                    else if(taxable_income >= 400001 && taxable_income <= 800000)
                        annual_tax = ((taxable_income - 400000) * 0.25) + 30000;
                    else if(taxable_income >= 800001 && taxable_income <= 2000000)
                        annual_tax = ((taxable_income - 800000) * 0.3) + 130000;
                    else if(taxable_income >= 2000001 && taxable_income <= 8000000)
                        annual_tax = ((taxable_income - 2000000) * 0.32) + 490000;
                    else if(taxable_income > 8000000)
                        annual_tax = ((taxable_income - 8000000) * 0.35) + 2410000;
                    else
                        annual_tax = 0;

                    jQuery('#monthly-income-tax').val(parseFloat(annual_tax / 12, 2).toFixed(2));
                    jQuery('#sss').val(SSS);
                    jQuery('#pagibig').val(Pag_IBIG);
                    jQuery('#philhealth').val(PhilHealth);
                }
            });
        });

        function computeTaxableIncome(MI) {
            if (MI >= 0 && MI <= AB)
                return (MI * 12) - ((SSS * 12) + (PhilHealth * 12) + (Pag_IBIG * 12));
            else
                return ((MI * 13) - 90000) - ((SSS * 12) + (PhilHealth * 12) + (Pag_IBIG * 12));
        }

        function computePhilhealth(pay) {
        if(pay <= 10000)
            return 137.5;
        else if(pay >= 40000)
            return 550;
        else
            return ((pay * 0.0275) / 2);
        }

        function computeSSS(pay) {
            if(pay >= 1000 && pay <= 1249.99)
                return 36.3;
            else if(pay >= 1250 && pay <= 1749.99)
                return 54.5;
            else if(pay >= 1750 && pay <= 2249.99)
                return 72.7;
            else if(pay >= 2250 && pay <= 2749.99)
                return 90.8;
            else if(pay >= 2750 && pay <= 3249.99)
                return 109;
            else if(pay >= 3250 && pay <= 3749.99)
                return 127.2;
            else if(pay >= 3750 && pay <= 4249.99)
                return 145.3;
            else if(pay >= 4250 && pay <= 4749.99)
                return 163.5;
            else if(pay >= 4750 && pay <= 5249.99)
                return 181.7;
            else if(pay >= 5250 && pay <= 5749.99)
                return 199.8;
            else if(pay >= 5750 && pay <= 6249.99)
                return 218;
            else if(pay >= 6250 && pay <= 6749.99)
                return 236.2;
            else if(pay >= 6750 && pay <= 7249.99)
                return 254.3;
            else if(pay >= 7250 && pay <= 7749.99)
                return 272.5;
            else if(pay >= 7750 && pay <= 8249.99)
                return 290.7;
            else if(pay >= 8250 && pay <= 8749.99)
                return 308.8;
            else if(pay >= 8750 && pay <= 9249.99)
                return 327;
            else if(pay >= 9250 && pay <= 9749.99)
                return 345.2;
            else if(pay >= 9750 && pay <= 10249.99)
                return 363.3;
            else if(pay >= 10250 && pay <= 10749.99)
                return 381.5;
            else if(pay >= 10750 && pay <= 11249.99)
                return 399.7;
            else if(pay >= 11250 && pay <= 11749.99)
                return 417.8;
            else if(pay >= 11750 && pay <= 12249.99)
                return 436;
            else if(pay >= 12250 && pay <= 12749.99)
                return 454.2;
            else if(pay >= 12750 && pay <= 13249.99)
                return 472.3;
            else if(pay >= 13250 && pay <= 13749.99)
                return 490.5;
            else if(pay >= 13750 && pay <= 14249.99)
                return 508.7;
            else if(pay >= 14250 && pay <= 14749.99)
                return 526.8;
            else if(pay >= 14750 && pay <= 15249.99)
                return 545;
            else if(pay >= 15250 && pay <= 15749.99)
                return 563.2;
            else if(pay >= 15750)
                return 581.3
            else
                return 0;
        }

        function computePagibig(pay) {
            if(pay >=1 && pay <= 1500)
                return (pay * 0.01);
            else if(pay > 1500)
                return 100;
            else
                return 0;
        }
    
    </script>

@endsection