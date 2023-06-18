<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('news')->insert([
            [
                "tittle" => "Oscar ödüllü oyuncu Glenda Jackson hayatını kaybetti",
                "description" => "İngiliz sinemasının kült filmlerindeki rolüyle tanınan oyuncu ve eski milletvekili Glenda Jackson, 87 yaşında hayatını kaybetti. Jackson ile yıllarca beraber çalışan oyuncu yönetmeni Lionel Larner, yazılı açıklamasında, ünlü oyuncunun kısa bir hastalık geçirdikten sonra bu sabah ailesinin refakatinde yaşamını yitirdiğini bildirdi. Larner, Jackson'ın en son Irene Jordan rolünü canlandırdığı \"The Great Escaper\" filminin çekimlerini tamamladığını aktardı."

            ],
            [
                "tittle" => "Kahramanmaraş'ta UFO paniği! O anlar anbean kamerada",
                "description" => "Kahramanmaraş semalarında dün akşam saatlerinde tanımlanamayan bir cisim görüntülendi. Vatandaşların görüntülediği cisim bir süre sonra gözden kayboldu."

            ],
            [
                "tittle" => "NATO Genel Sekreteri Stoltenberg: İsveç, NATO'ya üye olmak için üzerine düşenleri yerine getirdi",
                "description" => "NATO Genel Sekreteri Jens Stoltenberg, İsveç'in NATO'ya üye olması noktasında üzerine düşenleri yerine getirdiğini ifade ederek, \"Erdoğan ile görüştüm. Toplantının oldukça olumlu geçtiğini söyledi\" dedi."
            ],
            [
                "tittle" => "Stefan Kuntz, Letonya maçı öncesi açıklamalarda bulundu",
                "description" => "A Milli Takım Teknik Direktörü Stefan Kuntz, “Genel olarak, ortam olarak, baskı olarak rahat bir maç bekleyebilirim. Rakibimiz kendini geliştirdi. Bizim de kendimizi geliştirdiğimizi ve sahaya yansıtmamız gerektiğini düşünüyorum” dedi.."
            ]
        ]);
    }
}
