
<?php 
include('../../../../../retail/admin/resources/dbconfig.php');
include('story_html5.html');
?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	function db_StoreData(a){
	    var score = 0;
		for(var i = 0; i < a.flatInteractions.length; i++) {
			if(a.flatInteractions[i].curAnswer != null) {
				score += a.flatInteractions[i].curAnswer.points;
			}
		}
		
	    var passscore = Math.round(a.maxPoints * 0.5);
	    var passpercent = a.attributes.passPercent;
	    var modid = <?php echo $_GET['id']; ?>;

	    console.log("Store to database:\n\nScore: " +score+ "\nPassing Score: " + passscore + "\nTotal Score: " + a.maxPoints + "\nPassing Percentage: " + passpercent + "%\nModule ID: " + modid + "\n");

	    $.ajax ({
	        type: "POST",
	        url: "../../../../../retail/admin/backend/storyline_datastore.php",
	        data: { score: score, passscore: passscore, maxscore: a.maxPoints, passpercent: passpercent, modid: modid},
	        beforeSend: function(){
	        },
	        success: function(data){
				console.log("\nSuccess storing to database.");
			}
	    });
		
        
	}

</script>