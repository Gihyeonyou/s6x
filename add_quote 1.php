
<?php
// check iser is logged
if (isset($_SESSION['admin'])) {

// get all subjects from database
$all_tags_sql = "SELECT * FROM All_Subjects ORDER BY Subject ASC ";
$all_subjects = autocomplete_list($dbconnect, $all_tags_sql, 'Subject');

// initialise subject variables
$tag_1 = "";
$tag_2 = "";
$tag_3 = "";

// initalise tag ID's
$tag_1_ID = $tag_2_ID = $tag_3_ID = 0;

 ?>

<div class = "admin-form">
    <h1>Add a Quote</h1>

    <form>
        <p>
            <textarea name="quote" placeholder="Quote (Required)" required></textarea>
        </p>

        <p><input name="author" placeholder="Author Name (First Middle Last)" /></p>

        <div class="autocomplete">
            <input name="subject1" id="subject1" placeholder="Subject 1 (required)" required />
        </div>

        <br /><br />

        <div class="autocomplete">
            <input name="subject2" id="subject2" placeholder="Subject 2" />
        </div>

        <br /><br />

        <div class="autocomplete">
            <input name="subject3" id="subject3" placeholder="Subject 3" />
        </div>

        <br /><br />

        <p><input calss="form-submit" type="submit" name="submit" value="Submit Quote" /></p>

    </form>


    <script>
        <?php include("autocomplete.php"); ?>

        /* arrays containing lines. */
        var all_tags = <?php print("$all_subjects")?>;
        autocomplete(document.getElementById("subject1"), all_tags);
        autocomplete(document.getElementById("subject2"), all_tags);
        autocomplete(document.getElementById("subject2"), all_tags);

    </script>

</div>

<?php
    } // end user logged on it

    else {
        $login_error = 'Please login to access this page';
        header("Location: index.php?page=../admin/login&error=$login_error");
    }
?>

