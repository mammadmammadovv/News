<?php $a=0; while( $a>10 ):?>
<div class="degisecek_icerik">
    <a class="menulistesi" href="#" data-kayit_id="<?php echo $kayit_id?>">Beğen</a>
</div>
<?php endwhile ?>

<script>
    $(function() {
    // Click handler'ı
    $('.menulistesi').click(function() {
        // data-kayit_id'den id'yi çekelim. 
        var kayit_id = $(this).data('kayit_id');        
 
        // Güncelleyeceğimiz div. Değişkeni tanımladıktan sonraki alt level'larda 
        // direkt erişebilirsin. Ancak üst seviyeden erişemezsin. O yüzden burada
        // tanımlarsak ajax success metodu içerisinde kullanabiliriz.
        // $(this) --> tıklanan link. $(this).closest --> Bizim linkin parent
        // elemanlarını tarar, class'ı match edeni bulur
        var parent_div = $(this).closest('.degisecek_icerik');
 
        // Ajax fonksiyonun
        $.ajax({
            type: 'GET',
            url: 'gosterkayit.php',
            data: 'kayit_id=' + kayit_id,
            success: function(response) {
                parent_div.html(response);
            }
        });
 
        // Ben olsam load'u kullanırım, çok daha kolay:
        // parent_div.load('gosterkayit.php?kayit_id=' + kayit_id);
         
        // Linki takip etmemesi için false döndürelim, javascript:void'e gerek kalmaz
        return false;
    });
});

$(function() {
    $('.menulistesi').click(function() {
        $(this).closest('.degisecek_icerik')
               .load('gosterkayit.php?kayit_id=' + $(this).data('kayit_id'));
         
        return false;
    });
});
</script>