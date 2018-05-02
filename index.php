<?php

require "vendor/autoload.php";


// use Reyzeal\Fuzzy\Rules;

// $x = new Rules();

// echo $x -> add('orang_sedang MEAN_AND suhu_dingin',['orang_sedang','suhu_dingin']);
// echo $x -> calc(['orang_sedang' => 0.1, 'suhu_dingin' => 0.2]);

// use Reyzeal\Fuzzy\Rules;
// use Reyzeal\Fuzzy\Input;

// $rules = new Rules();
// $in = new Input;

// $in -> addCategory('Pendaftaran') 
// 	-> addMembership('Turun',"trapmf",[0,0,60,120])
// 	-> addMembership('Naik',"trapmf",[60,160,160,160]);

// $in -> addCategory('Lowongan') 
// 	-> addMembership('Sedikit',"trapmf",[0,0,40,100])
// 	-> addMembership('Banyak',"trapmf",[40,100,100,100]);

// //print_r($x);

// //print_r($in -> calc('Pendaftaran',90));

// $rules -> input($in);
// $rules -> add('Pendaftaran_Turun AND Lowongan_Sedikit');
// $rules -> add('Pendaftaran_Naik AND Lowongan_Sedikit');
// $rules -> add('Pendaftaran_Naik AND Lowongan_Banyak');
// $rules -> add('Pendaftaran_Turun AND Lowongan_Banyak');
// print_r($rules -> calc(['Pendaftaran' => 90,'Lowongan' => 45]));

// use Reyzeal\Fuzzy;

// $fuzzy = new Fuzzy("Penerimaan SNMPTN","Tsukamoto");

// $fuzzy->input()-> addCategory('Alumni') 
// 	-> addMembership('Sedikit',"trapmf",[0,0,40,100])
// 	-> addMembership('Banyak',"trapmf",[40,60,100,100]);

// $fuzzy->input()-> addCategory('UN') 
// 	-> addMembership('Rendah',"trapmf",[0,0,30,50])
// 	-> addMembership('Sedang',"trapmf",[40,60,70,90])
// 	-> addMembership('Tinggi',"trapmf",[75,85,100,100]);

// $fuzzy->output()-> addCategory('Diterima')
// 	-> addMembership('Sedikit',"trapmf",[0,0,10,20])
// 	-> addMembership('Sedang',"trapmf",[10,40,50,60])
// 	-> addMembership('Banyak',"trapmf",[50,80,100,100]);

// $fuzzy->rules()-> add('Alumni_Sedikit AND UN_Rendah') -> then('Diterima_Sedikit');
// $fuzzy->rules()-> add('Alumni_Sedikit AND UN_Tinggi') -> then('Diterima_Sedang');
// $fuzzy->rules()-> add('Alumni_Banyak AND UN_Tinggi') -> then('Diterima_Banyak');
// // -> add('Pendaftaran_Naik AND Lowongan_Sedikit')
// // -> add('Pendaftaran_Naik AND Lowongan_Banyak')
// // -> add('Pendaftaran_Turun AND Lowongan_Banyak');

// print_r($fuzzy -> calc(['Alumni' => 90,'UN' => 80]));



use Reyzeal\Fuzzy;

$fuzzy = new Fuzzy("Produksi Tekstil","Tsukamoto");

$fuzzy->input()-> addCategory('Permintaan') 
	-> addMembership('Turun',"trapmf",[0,0,1000,5000])
	-> addMembership('Naik',"trapmf",[1000,5000,6000,6000]);





$fuzzy->input()-> addCategory('Persediaan') 
	-> addMembership('Sedikit',"trapmf",[0,0,100,600])
	-> addMembership('Banyak',"trapmf",[100,600,700,700]);





$fuzzy->output()-> addCategory('Produksi')
	-> addMembership('Berkurang',"trapmf",[0,0,2000,7000])
	-> addMembership('Bertambah',"trapmf",[2000,7000,8000,8000]);


$fuzzy->rules()
	-> add('Permintaan_Turun AND Persediaan_Banyak') 
	-> then('Produksi_Berkurang');
$fuzzy->rules()
	-> add('Permintaan_Turun AND Persediaan_Sedikit') 
	-> then('Produksi_Berkurang');
$fuzzy->rules()
	-> add('Permintaan_Naik AND Persediaan_Sedikit') 
	-> then('Produksi_Bertambah');
$fuzzy->rules()
	-> add('Permintaan_Naik AND Persediaan_Banyak') 
	-> then('Produksi_Bertambah');

echo $fuzzy -> calc([
	'Permintaan' => 4000,
	'Persediaan' => 300
]);



