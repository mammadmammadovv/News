<?php include 'header.php';


?>


<div role="main" class="main">
    <div class="container">
        <div class="row pt-5">

            <div class="col">

                <h1 class="mb-0">Xəbərlər</h1>
                <div class="divider divider-primary divider-small mb-4">
                    <hr class="mr-auto">
                </div>

                <?php
                // Pagination Start//
                $onpage = 2;
                $query = $db->prepare("SELECT * FROM news");
                $query ->execute();
                $total_result = $query ->rowCount();
                $total_pages = ceil($total_result / $onpage);

                $page = $_GET['page'];

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                if ($page < 1) {
                    $page = 1;
                }

                if ($page > $total_pages) {
                    $page = $total_pages;
                }

                $limit = ($page - 1) * $onpage;
                $newsquery = $db->prepare("SELECT * FROM news WHERE news_show='1' ORDER BY news_date DESC LIMIT $limit , $onpage");
                $newsquery->execute();
                while ($newspull = $newsquery->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="row mt-4">
                        <div class="col">

                            <span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-4">
                                <span class="thumb-info-side-image-wrapper p-0 d-none d-md-block">
                                    <a title="" href="news_detail.php?news_id=<?php echo $newspull['news_id'] ?>">
                                        <img src="<?php echo $newspull['news_image'] ?>" class="img-fluid" alt="" style="width: 195px; height:235px;">
                                    </a>
                                </span>
                                <span class="thumb-info-caption">
                                    <span class="thumb-info-caption-text">
                                        <h2 class="mb-3 mt-1"><a title="" class="text-dark" href="news_detail.php?news_id=<?php echo $newspull['news_id'] ?>"><?php echo $newspull                                                  ['news_title'] ?></a></h2>
                                        <span class="post-meta">
                                            <span><?php $date = strtotime($newspull['news_date']);
                                                    echo date('d M Y ', $date) ?> | <a href="#"><?php echo $newspull['news_author'] ?></a></span>
                                        </span>
                                        <p class="text-3 px-0 px-md-3"><?php echo $newspull['news_subtitle'] ?></p>
                                        <a class="mt-3" href="news_detail.php?news_id=<?php echo $newspull['news_id'] ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </span>
                                </span>
                            </span>

                        </div>
                    </div>
                <?php } ?>
                <div style="display: flex; justify-content:right; font-size:20px; margin-top:20px;" class="col-md-12">
            
                <?php 
                
                if($total_result > $limit){	//içerik sayısı, her sayfada gösterilecek içerik sayısından büyük ise sayfalama butonları aktif edilsin	 
                    echo '<br><br>';
                    /*
                        $x = 2 olduğu durumda, aktif sayfanın önceki ve sonraki 2 sayfa gösterilir, sonrasına ... ifadesi konularak kısaltma yapılır. 
                        böylelikle bütün sayfaları yazmamıza gerek kalmaz.
                        örnekler:
                        « Önceki 1...4 5 [6] 7 8...11 Sonraki »	  ||  [1] 2 3...11 Sonraki »	  ||   « Önceki 1...9 10 [11] 
                    */
                    $x = 2; //kısaltma limiti 
                    if($page > 1){	//sayfa 1 den küçük ise [Önceki] butonu oluşturulmaya uygundur	
                        $prev = $page-1;	//aktif pagenın bir önceki sayfa bulunur		
                        echo '<a class="pagination_btn" href="news.php?page='.$prev.'">« Geri </a>'; //link içerisine yazdırılıp [Önceki] butonu oluşturulur	  
                    }		 
                    if($page==1){ //sayfalamada 1. sayfada bulunuyorsak
                        echo '<a class="pagination_active"> 1 </a>'; //1. sayfayı menüde aktif olarak gösteriyoruz
                    }
                    else{ // bulunmuyorsak
                        echo '<a class="pagination_btn" href="news.php?page=1">1</a>'; //normal olarak gözüksün, aktif olmasın	
                    }
                    //menü kısaltma işlemi
                        //bulunduğumuz sayfa yani $sayfa = 6 olduğu durumda
                    if($page-$x > 2){ //6-2 > 2 değeri true döndürecek
                        echo '...'; //kısaltma etiketi yazdırılacak	
                        $i = $page-$x; //$i değişkenine 4 değeri atanacak	 
                    }else { 			
                        $i = 2; 		  
                    }
                    //$sayfa = 6 olduğu durumda = sonuc çıktısı -> 1 ...
                    
                    for($i; $i<=$page+$x; $i++) { //$i yani 4 değeri 8 değerine ulaşasıya kadar döngü çalışsın	> 4  5  6  7  8	
                        if($i==$page){ //$i değeri bulunduğumuz sayfa ile eşitse
                            echo '&nbsp;<a class="pagination_active">'.$i.'</a>&nbsp;'; // aktif olarak işaretlensin ve yazdırılsın > 4  5  [6]  7  8	
                        }
                        else{//değil ise
                            echo '<a class="pagination_btn" href="news.php?page='.$i.'">'.$i.'</a>'; //normal olarak yazdırılsın
                        }
                        if($i==$total_pages) break;  
                    }
                    //$sayfa = 6 olduğu durumda = sonuc çıktısı -> 1 ... 4  5  [6]  7  8	
                    
                    if($page+$x < $total_pages-1) { //6+2<11-1 ise	
                        echo '...'; //kısaltma etiketi yazdırılacak				
                        echo '<a class="pagination_btn" href="news.php?page='.$total_pages.'">'.$total_pages.'</a>'; //	son sayfa yazdırılacak	  
                    }elseif($page+$x == $sonSayfa-1) { 			
                        echo '<a class="pagination_btn" href="news.php?page='.$total_pages.'">'.$total_pages.'</a>'; 		 
                    }
                    //$sayfa = 6 olduğu durumda = sonuc çıktısı -> 1 ... 4  5  [6]  7  8 ... 11	
                    //menü kısaltma işlemi
                    
                    if($page < $total_pages){	//bulunduğumuz sayfa hala son sayfa değil ise	  
                        $next = $page+1; //bulundğumuz sayfa değeri 1 arttırılıyor		  
                        echo '<a class="pagination_btn" href="news.php?page='.$next.'"> İrəli » </a>'; //ve Sonraki butonu oluşturulup yazdırılıyor 		  
                    }	
                }
                
                ?>
            
            </div>



            </div>
            <div class="col-lg-3">
                <aside class="sidebar">
                    

                    <h4 class="mt-5 mb-3">Contact Us</h4>
                    <p>Contact us or give us a call to discover how we can help.</p>

                    <div class="divider divider-primary divider-small mb-4">
                        <hr class="mr-auto">
                    </div>

                    <form id="contactForm" action="https://siteyukseltme.com/indir/demo/html/php/contact-form.php" method="POST">
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Your name *</label>
                                <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Your email address *</label>
                                <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Subject</label>
                                <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label>Message *</label>
                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control" name="message" id="message" required></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <input type="submit" value="Send Message" class="btn btn-lg btn-primary" data-loading-text="Loading...">

                                <div class="alert alert-success d-none" id="contactSuccess">
                                    Message has been sent to us.
                                </div>

                                <div class="alert alert-danger d-none" id="contactError">
                                    Error sending your message.
                                </div>
                            </div>
                        </div>
                    </form>

                </aside>
            </div>
        </div>

    </div>
</div>



<?php include 'footer.php' ?>