<?php
include('db_psicoterapia.php');


session_start();
if(!empty($_SESSION['userID'])){
  header('location:userdashboard.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<script src="./removeBanner.js"></script>
	<title>Psicoterapia | Care for your loved ones</title>
	<link rel="icon" type="png" href="userDesigns/user_images/noLabelLogo.png">
	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
      <link rel="stylesheet" type="text/css" href="policy.css">
      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body style="background-color: #F1F3FF;">

	<!--<div class="containers">-->
		<nav class="main-nav">
        <input type="checkbox" id="check" />
        <label for="check" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo"><label class="psico">Psico</label><label class="terapia">terapia</label></a>
        <ul class="navlinks">
          <li><a href="index.php">Home</a></li>
          <li><a href="policy.php">Policy</a></li>
          <li><a href="AboutUs.php" class="active">About us</a></li>
          <li><a href="userLogin.php" class="signIn">Sign in</a></li>
        </ul>
      </nav>
</head>
<body>
	<div class="content">
		<br>
		<br>
	<h3>Your Mental Health Matters</h3>
	<br>
	<h3>Care for yourself</h3>
	<p>Self-care can play a role in maintaining your mental health and help support your treatment and recovery if you have a mental illness. Here are some tips. Get regular exercise, just 30 minutes of walking every day can help boost your mood and improve your health, eat healthy, regular meals and stay hydrated, make sleep a priority, try a relaxing activity, set goals and priorities, practice gratitude, focus on positivity and stay connected. </p>

	<h3>Care for your Friends</h3>
	<p>There&rsquo;s something about friends that you&rsquo;ll never find with family. Somehow, we&rsquo;re always more comfortable confiding in friends than family. Then what if your friends experiencing mental illness and need your support. Here are somes steps to help them find support they need, first support them in continuing therapy with psicoterapia, second set boundaries, third offer also to help with everyday tasks, fourth stay in touch and most important one is be patient. </p>

	<h3>Care for your Family</h3>
	<p>Family is really an important word. It means to feel secure, to have someone who you can count on, whom you can share your problems with and family performs several essential functions in individual and to our society. Here are some support to help every members of your family in experiencing mental crisis. Important tips are upon you&rsquo;d need acknowledge the problems and mental illness of your family with ,develop new ways of taking care of yourself as member, relating to others as inpirations, as well as yourself, consider seeing a mental health professional yourself, smile ang keep in touch in each other.</p>
	
	<br>
	<h3>What does it mean to have a mental illness?</h3>
	<p>Mental illnesses are health conditions that disrupt a person’s thoughts, emotions, relationships, and daily functioning. They are associated with distress and diminished capacity to engage in the ordinary activities of daily life.

	<p>Mental illnesses fall along a continuum of severity: some are fairly mild and only interfere with some aspects of life, such as certain phobias. On the other end of the spectrum lie serious mental illnesses, which result in major functional impairment and interference with daily life. These include such disorders as major depression, schizophrenia, and bipolar disorder, and may require that the person receives care in a hospital.</p>

	<p>It is important to know that mental illnesses are medical conditions that have nothing to do with a person’s character, intelligence, or willpower. Just as diabetes is a disorder of the pancreas, mental illness is a medical condition due to the brain’s biology.</p>

	<p>Similarly to how one would treat diabetes with medication and insulin, mental illness is treatable with a combination of medication and social support. These treatments are highly effective, with 70-90 percent of individuals receiving treatment experiencing a reduction in symptoms and an improved quality of life. With the proper treatment, it is very possible for a person with mental illness to be independent and successful.</p>

	<h3>Who does mental illness affect?</h3>
	<p>It is estimated that mental illness affects 1 in 5 adults in America, and that 1 in 24 adults have a serious mental illness. Mental illness does not discriminate; it can affect anyone, regardless of gender, age, income, social status, ethnicity, religion, sexual orientation, or background.</p>
	<p>Although mental illness can affect anyone, certain conditions may be more common in different populations. For instance, eating disorders tend to occur more often in females, while disorders such as attention deficit/hyperactivity disorder is more prevalent in children.</p>
	<p>Additionally, all ages are susceptible, but the young and the old are especially vulnerable. Mental illnesses usually strike individuals in the prime of their lives, with 75 percent of mental health conditions developing by the age of 24. This makes identification and treatment of mental disorders particularly difficult, because the normal personality and behavioral changes of adolescence may mask symptoms of a mental health condition.</p>
	<p>Parents and caretakers should be aware of this fact, and take notice of changes in their child’s mood, personality, personal habits, and social withdrawal. When these occur in children under 18, they are referred to as serious emotional disturbances (SEDs).</p>
	<h3>What causes mental illness?</h3>
	<p>Although the exact source of mental illness is not known, research points to a mix of genetic, biological, psychosocial, and environmental factors as being the root of most conditions.</p>
	<p>Since this combination of causes is complex, there is no sure way to prevent mental illness. However, you can reduce your risk by practicing self-care, seeking help when you need it, and paying attention to early warning signs.</p>
	<h3>What are some of the warning signs of mental illness?</h3>
	<p>Symptoms of mental health disorders vary depending on the type and severity of the condition. The following is a list of general symptoms that may suggest a mental health disorder, particularly when multiple symptoms are expressed at once.</p>
	<i>In adults:</i>
<p>
	<ul>Confused thinking</ul>
	<ul>Long-lasting sadness or irritability</ul>
	<ul>Extreme highs and lows in mood</ul>
	<ul>Excessive fear, worrying, or anxiety</ul>
	<ul>Social withdrawal</ul>
	<ul>Dramatic changes in eating or sleeping habits</ul>
	<ul>Strong feelings of anger</ul>
	<ul>Delusions or hallucinations (seeing or hearing things that are not really there)</ul>
	<ul>Increasing inability to cope with daily problems and activities</ul>
	<ul>Thoughts of suicide</ul>
	<ul>Denial of obvious problems</ul>
	<ul>Many unexplained physical problems</ul>
	<ul>Abuse of drugs and/or alcohol</ul>
		</p>
		<i>In older children and pre-teens:</i>
		<ul>Abuse of drugs and/or alcohol</ul>
		<ul>Inability to cope with daily problems and activities</ul>
		<ul>Changes in sleeping and/or eating habits</ul>
		<ul>Excessive complaints of physical problems</ul>
		<ul>Defying authority, skipping school, stealing, or damaging property</ul>
		<ul>Intense fear of gaining weight</ul>
		<ul>Long-lasting negative mood, often along with poor appetite and thoughts of death</ul>
		<ul>Frequent outbursts of anger</ul>
	<i>In younger children:</i>
		<ul>Changes in school performance</ul>
		<ul>Poor grades despite strong efforts</ul>
		<ul>Excessive worrying or anxiety</ul>
		<ul>Hyperactivity</ul>
		<ul>Persistent nightmares</ul>
		<ul>Persistent disobedience and/or aggressive behavior</ul>
		<ul>Frequent temper tantrums</ul>
	</div>
	<footer>
	<div class="foots col-md-12 ">
		
		<div class="footer1 ">	
			
			<div class="logoBottom">
			<p class="logonameBot">Psico<label>terapia</label></p></div>
		<!--<img  src="noLabelLogo.png" alt="">Psicoterapia-->
		<p>
		Psicoterapia is an online booking site for professional care needed for mental health necessities. It also offers articles to help people fight against mental health problems.
</p>
		</div>
		<div class="footer1">	
		<ul>	
		<p class="learn">LEARN MORE</p>	
		<a href="userGetHelp.html" class="learn">Get Help</a>	
		<br>
		<br>
		<a href="userVolunteer.html"class="learn">Volunteer</a>
		<br>
		<br>
		<a href="#" class="learn" data-bs-toggle="modal" data-bs-target="#exampleModal">Donate</a>
		<br>
		</ul>
		</div>
		<div class="footer1">	
		<ul>	
		<p>Join us on:</p>	

		<a href="https://www.facebook.com/MentalHealthCenterNH/" class="facebook"><img src="userDesigns/user_images/facebook.png" style="height: 25px;"></a>
    <a href="https://www.instagram.com/mhcgm/" class="instagram"><img src="userDesigns/user_images/instagram.png" style="height: 25px;"></a>
    <a href="https://twitter.com/MentalHealthNH" class="twitter"><img src="userDesigns/user_images/twitter.png" style="height: 25px;"></a>
		</ul>
		</div>
		</div>	

	</footer>
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
  <div class="col-50">
    <div class="container" >
       <form  action="donate.php" method="post" style="padding: 25px;">
      
        <div class="row">
          <div class="col-25">
            <h3>Psicoterapia Donate</h3> <br>
          
           
            <label class="lbl">Gcash Number</label>
            
            <p>Psicoterapia - 09563123116</p>
        
            <label  class="lbl">Visa</label>
           
            <p>4003830171874018</p>
           
            <label  class="lbl">Mastercard</label>
            
            <p>5496198584584769</p>
            <label class="lbl">JCB</label>
            
            <p>3530111333300000</p>
            <br>
        </form>


          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
<!--</div>-->



</body>
</html>