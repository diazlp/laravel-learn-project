<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sign Up Form</title>
    </head>
    <body class="antialiased">
    <div>
            <h1>Buat Account Baru!</h1>
            <h2>Sign Up Form</h2>
        </div>
        
        <div>
            <form action="/welcome">
                <p><label for="firstname">First Name:</label></p>
                <input type="text" id="firstname">

                <p><label for="lastname">Last Name:</label></p>
                <input type="text" id="lastname">

                <p><label for="gender">Gender:</label></p>
                <input type="radio" name="gender" value="0" id="gender"> Male <br>
                <input type="radio" name="gender" value="1" id="gender"> Female <br>
                <input type="radio" name="gender" value="2" id="gender"> Other <br>
                
                <p><label>Nationality:</label></p>
                <select>
                    <option value="0">Indonesian</option>
                    <option value="1">Singaporean</option>
                    <option value="2">Malaysian</option>
                    <option value="3">Australian</option>
                </select>

                <p><label>Language Spoken:</label></p>
                <input type="checkbox" name="language" value="0"> Bahasa Indonesian <br>
                <input type="checkbox" name="language" value="1"> English <br>
                <input type="checkbox" name="language" value="2"> Other
                
                <p><label>Bio:</label></p>
                <textarea cols="30" rows="10"></textarea> <br>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>
</html>
