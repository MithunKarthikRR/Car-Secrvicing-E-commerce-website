
<?php


session_start();


 $con = mysqli_connect('localhost','root','','carservice1');



mysqli_select_db($con, 'carservice1');
if(isset($_POST['rohith']))

{  
    $username=$_POST['username'];
    $name=$_POST['name'];
    $emailID=$_POST['emailID'];
    $mobilenumber=$_POST['mobilenumber'];
    $password1=$_POST['password1'];
    $gender=$_POST['Gender'];
    $DOB=$_POST['DOB'];
    $country=$_POST['country'];
    $doorno=$_POST['doorno'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];
    
    
     $s="select * from person where name = '$username'";
    
     $result = mysqli_query($con, $s);
    
     $num= mysqli_num_rows($result);
    
    
    if ($num == 1) {
    
    
    echo" Usename Already Taken";
    
    }else{
    
    
    
    $reg= "insert into  person(username, name, emailID, password1,mobilenumber, gender) values ('$username' ,'$name' ,'$emailID' ,'$password1' ,$mobilenumber ,'$gender')";
    $newreg="insert into  personaddress(username,DOB, country, doorno, address, state, pin) values ('$username','$DOB','$country',$doorno ,'$address' ,'$state', $pin)";
    $results= mysqli_query($con, $reg);
    $results1= mysqli_query($con,$newreg);
    
    if($results && $results1){

        echo '<script>alert("Updated Succesfully!")</script>'; header("refresh:5;url=login.php");
    

    }

    else{

       echo("Connection failed. Approval Failed!".mysqli_error($con));

       

    }
    echo"Registration Successful";
   
    
     }

}


 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="Sign up.css">
    <script>
      function get_data(){
         var username = document.getElementById("username").value
         var name = document.getElementById("name").value
         var email = document.getElementById("emailID").value
         var mobile_number = document.getElementById("mobilenumber").value
         var password = document.getElementById("password1").value
         var Gender = document.getElementById("gender").value
         var DOB = document.getElementById("DOB").value
         var country = document.getElementById("country").value
         var userDetails = {"username":username,"name":name,"email":email,"mobileNumber":mobilenumber,"password1":password1,"gender":Gender,"DOB":DOB,"country":country} 
        console.log(userDetails)
        var users=localStorage.getItem("users")
        var user=JSON.parse(users||"[]")
        user.push(userDetails)
        localStorage.setItem("users",JSON.stringify(user))
        }
        function redirect(){
            return true
        }
    </script>
</head>
<body>
    <div class="form">
    <p><b>SIGN UP</b></p>
    <form onsubmit="return redirect()" action="" method="POST">
    <pre>
        <input required type="text" name="username" id="username" placeholder="Customer id"><input required type="text" name="name" id="name" placeholder="Enter your name">
        <input required type="email" name="emailID" id="emailID" placeholder="Enter your email-ID"><input required type="number" name="mobilenumber" id="mobilenumber" placeholder="Enter your mobile number">
        <input required type="password" pattern="[0-9a-zA-Z@]{8,}" name="password1" id="password1" placeholder="Enter your password"><select name="Gender" id="gender" ><option value="" selected hidden disabled>Select Gender</option> <option value="Male">Male</option> <option value="Female">Female</option> <option value="Others">Others</option> </select>    
        <input required type="date" name="DOB" id="DOB" placeholder="Enter your DOB"><select name="country" id="country" > <option value=""  selected hidden disabled>Select Country</option> <option value="India">India</option> <option value="Singapore">Singapore</option> <option value="Qatar">Qatar</option> </select>
        <input required type="number" name="doorno" id="doorno" placeholder="Door No."><input required type="text" name="address" id="address" placeholder="Enter your address">
        <input required type="text" name="state" id="state" placeholder="Enter your State"><input required type="number" name="pin" id="pin" placeholder="Enter your PIN code">
        <button type="submit" name="rohith" onclick="get_data()">SUBMIT</button><button type="reset">RESET</button>
        </pre>
        <p class="message">Already registered? <a href="login.html">Back to login</a></p>
    </form>
    </div>
    </body>
    </html>