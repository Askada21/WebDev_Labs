<!DOCTYPE html>
<html>
    <head>
        <h1>Sport Club Feed Back Form</h1>
    </head>
    <body>
        <h4>Please fill out this form to let us know what you think of the club so that we can improve it</h4>
        <form>
            <p>
                Full Name:
                <input type="text" name="fullname">
            </p>
            <p>
                Email:
                <input type="text" name="email">
            </p>

            <h4>Which sports do you enjoy most?:</h4>

            <p>
                Swimming <input type="checkbox" name="sport" value="Swimming">
                Football <input type="checkbox" name="sport" value="Football">
                Tennis <input type="checkbox" name="sport" value="Tennis">
                <br> 
                Snoocker <input type="checkbox" name="sport" value="Snoocker">
                Golf <input type="checkbox" name="sport" value="Golf">
            </p>    

            <h4>How long have you been a member of the club?</h4>

            <p>
                Less than one year <input type="radio" name="membership" value="less_than_one_year">
                One to two years <input type="radio" name="membership" value="one_to_two_years">
                More than two years <input type="radio" name="membership" value="more_than_two_years">
            </p>

            <h4>Please give us any additional feedback thet you may have</h4>
            
            <p>
                Comments: 
                <textarea name="comments" rows="4" cols="40"></textarea>
            </p>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>

        <?php 
            $text = 'I love PHP';
            $name = 'Daria';

            echo "My name is $name, I have to say that $text";

            echo "<p>Number of characters: " . strlen($text) . "</p>";
            echo "<p>Position of PHP: " . strpos($text, 'PHP') . "</p>";
        ?>

    </body>
</html>