
# CV Oluşturma Projesi
Bu projemde, bir formdan gelen kullanıcı verileri ile otomatik olarak bir CV oluşturulmaktadır ve oluşturulan CV'nin renk, şablon ve font özelliklerinde özelleştirme seçenekleri bulunmaktadır. Projede 6 farklı CV şablonu, 6 farklı font ve 7 farklı renk seçeneği bulunmaktadır. Bu seçenekler kolaylıkla arttırılabilir durumdadır. CV oluşturma sayfasında dark mode seçeneği de bulunmaktadır. Kullanıcılar CV'lerini ister light mode ister dark mode seçeneğine göre yazdırabilmektedirler. 

Kullanıcılara ayrıca sınırsız dil seçeneği de sunulmaktadır. Oluşturulan CV'ler kolayca istenilen dile çevirilebilmektedir. Bu dil seçeneği **Google Translator** desteklidir. Özelleştirilen CV'nin alanlarında kullanıcılar diledikleri gibi yer değişimi yapabilmektedir. Her alanı ister aşağı, yukarı ister sağa, sola kaydırarak alanları istedikleri gibi hizalayabilirler. Sürükle bırak yaparak yer değiştirme işlemi **Sortable.js** kütüphanesi kullanılarak yapılmıştır.

Kullanıcılar ücretsiz bir şekilde CV oluşturabilmektedir. Sisteme kayıt olan kullanıcılar oluşturdukları tüm CV'leri daha sonrasında istediği zaman düzenleyebilirler. Kayıt olmadan da kullanıcılar CV oluşturabilir ancak daha sonra düzenleyemezler. Sisteme kayıt tamamen ücretsizdir.

## Proje Yayını
Projeyi canlı olarak görmek ve kullanmak için [cv.yasinakbulut.com](https://cv.yasinakbulut.com) adresini ziyaret edebilirsiniz. [yasinakbulut.com](https://yasinakbulut.com/) sitesi kişisel portfolyo sitesidir, diğer projelerimi, deneyimlerimi ve çalışmalarımı inceleyebilirsiniz.

## Proje Geliştirilmesi ve Örnek Kodları

Projeyi geliştirirken Frontend tarafında **Html/Css** ve **JavaScript**, Backend tarafında ise **PHP/PDO** ve **MySQL** veritabanını kullandım. Kullanıcı verilerini saklamak ve CV şablonları içerisinde kullanabilmek için MySQL içerisinde bir veritabanı oluşturdum. Bu veritabanı içerisinde CV'ye yazılması gereken tüm veriler için tablolar oluşturdum. 

Bir kullanıcı CV oluşturmadan CV şablonu seçme ve özelleştirme seçeneklerini kullanabilmektedir. Siteye giren kullanıcılar ilk olarak default verilerle doldurulmuş olan örnek CV içeriği ile CV şablonlarını test edebilmektedir. Default olarak gelen veriler `dummy.php` dosyası içerisinde bulunmaktadır. CV içerisine yazılacak her veri bir değişkende veya çoklu olarak yazılacak veriler bir dizi içerisinde tutulmaktadır.

Default olarak oluşturulan verilere ait örnek kod çıktısı;
```php
<?php
	$name = "Name Surname";
	$fetchSkillData = array(
		array( "skillName" => "JavaScript", "skillLevel" => "85"),
		array( "skillName" => "HTML/CSS", "skillLevel" => "92"),
		array( "skillName" => "Photoshop", "skillLevel" => "70"),
		array( "skillName" => "Adobe XD", "skillLevel" => "57"),
		array( "skillName" => "Figma", "skillLevel" => "77"),
	);
?>
```

CV oluşturma formunu dolduran kullanıcıların verilerini `cvPost.php` dosyasında post ederek belirli değişkenlere atadım. Çoklu olabilecek değerleri bir dizi şeklinde post ettim ve veritabanına sıralı şekilde kaydettim. 

PHP ile post işlemi yaptığım verilere ait örnek kod çıktısı;
```php
<?php
	$name = $_POST['name'];
	for($i=0; $i < count($_POST['skillName']); $i++){
		$skillName = $_POST['skillName'][$i];
		$skillLevel = $_POST['skillLevel'][$i];
		$addSkill = $data->prepare("insert into skills set
			submission_id=?,
			skillName=?,
			skillLevel=?
	");
	$addSkillProcess = $addSkill->execute(array($submission_id,$skillName,$skillLevel));
	
	// control process $i = error index
	if(!$addSkillProcess){ errorMessage("Skill","2504-".$i); }
}
?>
```
Her kullanıcıya ait benzersiz bir `submission_id` değeri belirledim ve bu değere ait verileri CV sayfasında çekerek tüm CV şablonları içerisinde yazdırdım. CV şablonları içerisine yazılacak her çoklu veri için `functions.php` dosyasında birer fonksiyon oluşturdum ve tüm CV şablonlarında gerekli yerlerde fonksiyonu çağırdım. 

Oluşturduğum fonksiyonlara ve kullanımlarına ait örnek bir kod çıktısı;

```php
<?php
	function getSkills($fetchSkillData,$tagName){
		foreach($fetchSkillData  as  $key  =>  $item){
		echo  '
			<li>
				<'.$tagName.'>'.$item['skillName'].'</'.$tagName.'>
				<div class="level-bar">
					<div class="level" style="width: '.$item['skillLevel'].'%;"></div>
				</div>
			</li>
		';
		}
	}
?>

<div  class="cv-section">
	<h2  class="cv-title">Skills</h2>
	<ul  class="cv-list level-list">
		<?php  getSkills($fetchSkillData,'strong'); ?>
	</ul>
</div>
```

## Ekran Çıktısı
https://user-images.githubusercontent.com/62993659/189140058-56c05400-97d4-4395-99e2-da171a76a6b1.mp4

