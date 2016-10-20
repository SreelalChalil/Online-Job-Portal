<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title> NEW CLIENT REGISTRATION </title>

 <script type="text/javascript" src="/job_portal/js/validate.js"></script>
         <script>
             function checkForm() {
// Fetching values from all input fields and storing them in variables.
var email = document.getElementById("emailerror").innerHTML;
var pass1 = document.getElementById("pass1error").innerHTML;
var pass2 = document.getElementById("pass2error").innerHTML;
var compname = document.getElementById("comperror").innerHTML;
var addr = document.getElementById("addrerror").innerHTML;
var pincode = document.getElementById("pinerror").innerHTML;
var person = document.getElementById("personerror").innerHTML;
var phone = document.getElementById("pherror").innerHTML;
                 var about=document.getElementById("abouterror").innerHTML;
//alert(email + pass1 + pass2 + compname + addr + pincode + person + phone);
//Check input Fields Should not be blanks.
//validateRadio("comtype","typeerror");
var p1=document.getElementById("pass1").value;
var p2=document.getElementById("pass2").value;
    if (p1 != p2) {
        document.getElementById("pass2error").innerHTML="Password Donot Match" ;
    }
    else
    {
        document.getElementById("pass2error").innerHTML="" ;

    }

if(email == "" && pass1 == "" && pass2 == "" &&  compname == "" && addr == "" && pincode == "" && person == "" && phone == "" && about == "") {

   //document.getElementById("regcomp").submit();
    return true;
    }

else {

    alert("Fill in with correct information");
    return false;
      }

}
 </script>
</head>
<body>

<!-- navigation bar starts here -->
<nav class="navbar" id="insidenav">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../index.php">Job Portal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Employer Registration</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<!-- navigation bar ends here -->

<!-- container div for page contents -->
<div class="container">
    <div class="jumbotron">
       <h1>Register your company</h1>
        <div id="insidejumb">
        <p>
            Register today and post a job in easy steps and start receiving applications the same day.
            Find the right candidates easily and quickly through our Search feature.
        </p>
        </div>
    </div>
<form role="form" id="regcomp" onsubmit="return checkForm()" class="form-horizontal" method="post" action="process_regemp.php">
<h3 class="h3style"> Your Login details </h3>
<div class="page-header"> </div>
    
<div class="form-group">
    <label for="email" class="control-label col-sm-2">E-mail:</label>
    <div class="col-sm-4">
       <input type="email" required placeholder="Enter your email" class="form-control" name="email" id="email"
          onblur="validate('email','emailerror',this.value)">
    </div>
    <label class="error" id="emailerror"></label>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="pass1">Password:</label>
    <div class="col-sm-4">  
        <input type ="password"  placeholder="Enter your password" name="pass1" id="pass1" class="form-control"
               required onblur="validate('password','pass1error',this.value)">
    </div>
    <label class="error" id="pass1error"></label>
</div>

<div class="form-group">
    <label for="pass2" class="control-label col-sm-2"> Confrim Password: </label>
    <div class="col-sm-4">
        <input type ="password"  placeholder="Confirm your password" name="pass2" id="pass2" class="form-control" required>
    </div>
    <label class="error" id="pass2error"></label>
</div>

<div class="page-header"></div>
<h3 class="h3style"> Your Company Details</h3>
<div class="page-header"></div>

<div class="form-group">
  <label class="control-label col-sm-2"> Company Name:</label>
    <div class="col-sm-5"> 
      <input type ="text" class="form-control" name="compname" id="compname" placeholder="Enter Company Name"
             required onblur="validate('company','comperror',this.value)">
   </div>
    <label class="error" id="comperror"></label>
</div>


<div class="form-group">
   <label class="control-label col-sm-2" for="comtype"> Company Type: </label>
    <div class="col-sm-4 form-inline" id="comtype">
        <label class="radio-inline"><input type="radio" name="comtype" id="type1" value="Company">Company</label>
        <label class="radio-inline"><input type="radio" name="comtype" id="type2" value="Consultant">Consultant</label>
    </div>
    <label class="error" id="typeerror"></label>
</div>

 <div class="form-group">
                <label for="indtype" class="control-label col-sm-2">Industry:</label>
                <div class="col-sm-4"> 
                    <select name="indtype" id="indtype" class="form-control"  required>
                    <option selected="selected" value="">- Select an Industry -</option>
                    <option value="Accessories/Apparel/Fashion Design">Accessories/Apparel/Fashion Design</option>
                    <option value="Accounting/Consulting/Taxation">Accounting/Consulting/Taxation</option>
                    <option value="Advertising/Event Management/PR">Advertising/Event Management/PR</option>
                    <option value="Agriculture/Dairy Technology">Agriculture/Dairy Technology</option>
                    <option value="Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants">Airlines/Hotel/Hospitality/Travel/Tourism/Restaurants</option>
                    <option value="Animation / Gaming">Animation / Gaming</option>
                    <option value="Architectural Services/ Interior Designing">Architectural Services/ Interior Designing</option>
                    <option value="Auto Ancillary/Automobiles/Components">Auto Ancillary/Automobiles/Components</option>
                    <option value="Banking/Financial Services/Stockbroking/Securities">Banking/Financial Services/Stockbroking/Securities</option>
                    <option value="Banking/FinancialServices/Broking">Banking/FinancialServices/Broking</option>
                    <option value="Biotechnology/Pharmaceutical/Clinical Research">Biotechnology/Pharmaceutical/Clinical Research</option>
                    <option value="Brewery/Distillery">Brewery/Distillery</option>
                    <option value="Cement/Construction/Engineering/Metals/Steel/Iron">Cement/Construction/Engineering/Metals/Steel/Iron</option>
                    <option value="Ceramics/Sanitaryware">Ceramics/Sanitaryware</option>
                    <option value="Chemicals/Petro Chemicals/Plastics">Chemicals/Petro Chemicals/Plastics</option>
                    <option value="Computer Hardware/Networking">Computer Hardware/Networking</option>
                    <option value="Consumer FMCG/Foods/Beverages">Consumer FMCG/Foods/Beverages</option>
                    <option value="Consumer Goods - Durables">Consumer Goods - Durables</option>
                    <option value="Courier/Freight/Transportation/Warehousing">Courier/Freight/Transportation/Warehousing</option>
                    <option value="CRM/ IT Enabled Services/BPO">CRM/ IT Enabled Services/BPO</option>
                    <option value="Education/Training/Teaching">Education/Training/Teaching</option>
                    <option value="Electricals/Switchgears">Electricals/Switchgears</option>
                    <option value="Employment Firms/Recruitment Services Firms">Employment Firms/Recruitment Services Firms</option>
                    <option value="Entertainment/Media/Publishing/Dotcom">Entertainment/Media/Publishing/Dotcom</option>
                    <option value="Export Houses/Textiles/Merchandise">Export Houses/Textiles/Merchandise</option>
                    <option value="FacilityManagement">FacilityManagement</option>
                    <option value="Fertilizers/Pesticides">Fertilizers/Pesticides</option>
                    <option value="FoodProcessing">FoodProcessing</option>
                    <option value="Gems and Jewellery">Gems and Jewellery</option>
                    <option value="Glass">Glass</option>
                    <option value="Government/Defence">Government/Defence</option>
                    <option value="Healthcare/Medicine">Healthcare/Medicine</option>
                    <option value="HeatVentilation/AirConditioning">HeatVentilation/AirConditioning</option>
                    <option value="Insurance">Insurance</option>
                    <option value="KPO/Research/Analytics">KPO/Research/Analytics</option>
                    <option value="Law/Legal Firms">Law/Legal Firms</option>
                    <option value="Machinery/Equipment Manufacturing/Industrial Products">Machinery/Equipment Manufacturing/Industrial Products</option>
                    <option value=">Mining">Mining</option>
                    <option value="NGO/Social Services">NGO/Social Services</option>
                    <option value="Office Automation">Office Automation</option>
                    <option value="Others/Engg. Services/Service Providers">Others/Engg. Services/Service Providers</option>
                    <option value="Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy">Petroleum/Oil and Gas/Projects/Infrastructure/Power/Non-conventional Energy</option>
                    <option value="Printing/Packaging">Printing/Packaging</option>
                    <option value="Publishing">Publishing</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Retailing">Retailing</option>
                    <option value="Security/Law Enforcement">Security/Law Enforcement</option>
                    <option value="Shipping/Marine">Shipping/Marine</option>
                    <option value="Software Services">Software Services</option>
                    <option value="Steel">Steel</option>
                    <option value="Strategy/ManagementConsultingFirms">Strategy/ManagementConsultingFirms</option>
                    <option value="Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor">Telecom Equipment/Electronics/Electronic Devices/RF/Mobile Network/Semi-conductor</option>
                    <option value="Telecom/ISP">Telecom/ISP</option>
                        <option value="Tyres">Tyres</option>
                    <option value="WaterTreatment/WasteManagement">WaterTreatment/WasteManagement</option>
                    <option value="Wellness/Fitness/Sports">Wellness/Fitness/Sports</option>
                </select>
          </div>
  <label class="error" id="inderror"></label>
</div>

<div class="form-group">
    <label for="addr" class="control-label col-sm-2">Address:</label>
      <div class="col-sm-5"><textarea id="addr" rows="5" name="addr" class="form-control" required 
          onblur="validate('address','addrerror',this.value)"></textarea>
    </div>
      <label class="error" id="addrerror"></label>
</div>

<div class="form-group">
      <label for="pincode" class="control-label col-sm-2">Pincode:</label>
       <div class="col-sm-4">
          <input type ="text" class="form-control" placeholder="Enter the pincode" name="pin_code" id="pincode"
                 required onblur="validate('pincode','pinerror',this.value)">
       </div>
      <label class="error" id="pinerror"></label>
</div>

<div class="form-group">
        <label class="control-label col-sm-2" for="person">Contact Person:</label>
        <div class="col-sm-4">
          <input type="text"class="form-control" placeholder="Enter Executive Name" id="person" name="person"
                 required onblur="validate('username','personerror',this.value)">
          <label class="error" id="personerror"></label>
        </div>
</div>

<div class="form-group">
        <label class="control-label col-sm-2" for="phone">Contact Number:</label>
        <div class="col-sm-4">
          <input type="text"class="form-control" placeholder="Enter Contact Number" id="phone" name="phone"
                 required onblur="validate('mobilenum','pherror',this.value)">
          <label class="error" id="pherror"></label>
        </div>
</div>

<div class="form-group">
        <label class="control-label col-sm-2"> Where are you currently located? </label>
                  <div class="form-inline"> 
                    <select name="country" class=" form-control countries" id="countryId" style="width:145px;" required>
                        <option value="">Select Country</option>
                     </select>
                   
                    <select name="state" class="form-control states" id="stateId" style="width:145px;" required>
                        <option value="">Select State</option>
                    </select> 
                    
                     <select name="city" class="form-control cities" id="cityId" style="width:145px;">
                        <option value="">Select City</option> 
                     </select>
                  </div>
</div>
    <div class="form-group">
        <label class="control-label col-sm-2">About Company:</label>
        <div class="col-sm-5">
            <textarea placeholder="Describe your company" class="form-control" rows="5" required onblur="validate('longtext','abouterror',this.value)"></textarea>
            <label class="error" id="abouterror"></label>
        </div>
    </div>
    <div class="page-header"> </div>
   <div class="form-group form-inline col-sm-10">
   <label for="reg" class="control-label col-sm-5">Check for errors before submitting the form!</label>
    <button class="btn btn-success" type="submit"  id="reg">Register</button>
    <label for"reset" class="control-label"> </label>
     <button class="btn btn-danger" type="reset" id="reset"> Reset </button>
</div>
</form>
</div>
<div class="page-header"> </div>
<link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/employer.css" rel="stylesheet">
<script src="../js/jquery-1.12.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../location/location.js"></script>
</body>
</html>
