
<div class="formbg-outer">
  <div class="formbg">
    <div class="formbg-inner padding-horizontal--48">
      <form id="stripe-login" action="test.php" method="post">
        <div class="field padding-bottom--24">
          <label for="email">Name</label>
          <input name="yourname" type="text" id="form4Example1" class="form-control" />
        </div>
        <div class="field padding-bottom--24">
          <div class="grid--50-50">
            <label for="password">Comment</label>
          </div>
          <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
        </div>
        <div class="field padding-bottom--24" style="text-align: center;">
          <input class="btn" type="submit" name="submit" value="Send">
        </div>
      </form>
    </div>
  </div>

				<style type="text/css">
					*{
						color: #be872b;
					}
					
					@font-face {
					    font-family: 'Boss Signature';
					    src: url('fonts/BossSignature.woff2') format('woff2'),
					        url('fonts/BossSignature.woff') format('woff');
					    font-weight: normal;
					    font-style: normal;
					    font-display: swap;
					}

					@font-face {
					    font-family: 'Khmer OS Metalchrieng';
					    src: url('fonts/KhmerOSMetalchrieng.eot');
					    src: url('fonts/KhmerOSMetalchrieng.eot?#iefix') format('embedded-opentype'),
					        url('fonts/KhmerOSMetalchrieng.woff2') format('woff2'),
					        url('fonts/KhmerOSMetalchrieng.woff') format('woff'),
					        url('fonts/KhmerOSMetalchrieng.ttf') format('truetype'),
					        url('fonts/KhmerOSMetalchrieng.svg#KhmerOSMetalchrieng') format('svg');
					    font-weight: normal;
					    font-style: normal;
					    font-display: swap;
					}
					label{
						font-family: 'Boss Signature', sans-serif;
					    font-size: 2.5rem;
					    color: #F3BF72;;
					}
					p{
						/*font-family: 'Boss Signature', sans-serif;
						font-size: 2.5rem;*/
						
					}
					input {
						background-color: none;
					}
					div.hlc:last-child{
						display: none;

					}
					div.slc{
						display:none;
					}
					div.slc:last-child{
						display: block;
					}
					p.hlc{
						margin: 0;
						padding: 0;
					}
					#parent {
					  /*display: flex;
					  flex-direction: column-reverse;*/
					  /*flex-direction: column;*/
					  height: 770px;
					  overflow-x: hidden;
				    overflow-y: auto;
					}

					#comment, #form4Example1 {
					    width: 100%;
					    margin-bottom: 15px;
					}
					#form4Example1 {
					    border-radius: 15px;
					    border: 1px solid #ccc;
					    padding: 10px;
					}
					#comment {
					    border: 2px solid #ccc;
					    border-radius: 19px;
					    height: 70px;
					    padding: 10px;
					}
					.btn{
							padding: 5px 15px;
							background-color: #361204;
							border: 1px solid #f3bf72;
							border-radius: 12px;
							color: #f3bf72;
						}
						.btn:hover {
							cursor: pointer;
							background-color: #0c4255;
						}
					.slc{
						display: flex;
					  flex-direction: column-reverse;
					  flex-direction: column;
					}
					.cmt{
						padding: 15px;
						background-color: #ededed;
						margin: 10px 10px 0 0;
						/*font-family: 'Boss Signature', sans-serif;*/
						font-family: 'Khmer OS Metalchrieng', sans-serif;
						border-radius: 20px;
					}
					.cmt p{
						padding: 0;
						margin: 0;
					}
					.cmt span{
						text-align: right;
						display: block;
					}
					.cmt i {
					    font-size: 1.5rem;
					    color: #be872b;
					}
					#form4Example1 {
					    border-radius: 15px;
					    border: 1px solid #ccc;
					    padding: 10px;
					}

					@media only screen and (max-width: 640px){

						.cmt{
							font-family: unset;
						}
				</style>
				 <?php
				 $yourname = '';
				 $comment='';
				 $result = '';
				if (isset($_POST['yourname'])) {
					$yourname = $_POST['yourname'];
				}
				if (isset($_POST['comment'])) {
					$comment = $_POST['comment'];
				}


				// format the comment data into how you want it to be displayed on the page
				if ($yourname != '' && $comment != '') {
					$data = "<div class='cmt slc'><p><i>&#9787;</i> ".$yourname . "</p><span>". $comment ."<i> &#9754;</i></span></div>";
					// $data1 = "<p class='hlc'>".$yourname .": " . $comment . "</p>";
					$data1 = "<div class='cmt hlc'><p><i>&#9787;</i> ".$yourname . "</p><span>". $comment ."<i> &#9754;</i></span></div>";
				}else{
					$data1 = ' ';
					$data = ' ';
				}


				//Open a text file for writing and save it in a variable of your chosen.    
				//Remember to use "a" not "w" to indicate write. Using 'w' will overwrite 
				// any existing item in the file whenever a new item is written to it.

				$myfile = fopen("comment.txt", "a"); 
				$myfile1 = fopen("comment1.txt", "a"); 

				//write the formatted data into the opened file and close it
				fwrite($myfile, $data); 
				fclose($myfile);

				fwrite($myfile1, $data1); 
				fclose($myfile1);

				// Reopen the file for reading, echo the content and close the file
				$myfile = fopen("comment.txt", "r");
				$myfile1 = fopen("comment1.txt", "r");



				// $myline = usort($myfile, create_function('$a,$b', 'return filemtime($b)-filemtime($a);'));
				// echo fread($myfile,filesize("comment.txt")); 
				echo '<div id="cmtlast" class="js-scroll fade-in-bottom">'.fread($myfile,filesize("comment.txt")).'</div>';
				echo '<div id="parent" class="js-scroll fade-in-bottom">'.fread($myfile1,filesize("comment1.txt")).'</div>';
				?> 


