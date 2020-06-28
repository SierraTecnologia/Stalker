<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace Artista\Components\Explorer\SenhorVerdugo;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Artisan;

class GetProfile
{
    public static function run($profileUrl)
    {
        QueryList::get($profileUrl)->find('.joms-app--wrapper > .app-box-content > ul')->map(
            function ($bloco) {
            
                $bloco->children()->map(
                    function ($item) {
                        $title = $item->find('h4')->text();
                        if (empty($title)) {
                            $title = $item->find('h5')->text();
                        }

                        if ($title == 'Informações pessoais') {
                            $skils = $item->find('span a')->texts();

                            $skils[0] = ''; //Preferências
                            $skils[1] = ''; //Sexo
                            $skils[2] = ''; //Orientação sexual
                            $skils[3] = ''; //Idade

                            var_dump($skils);
                        } else if ($title == 'Localização') {
                            $localizacao = $item->find('span a')->texts();

                            $localizacao[0] = ''; //Pais
                            $localizacao[1] = ''; //Estado

                            var_dump($localizacao);
                        } else if ($title == 'Interesses') {
                            $interesses = $item->find('span')->texts();
                            $interesses[0] = ''; //Procurando por:
                            $interesses[1] = ''; //Detalhes do que eu procuro
                            $interesses[2] = ''; //Sobre mim
                            var_dump($interesses);
                        } else if ($title == 'Informações para contato') {
                            $infos = $item->find('span')->texts();
                            $infos[0] = ''; //Website
                            $infos[1] = ''; //Posição no BDSM
                            var_dump($infos);
                        }
                    }
                );

            }
        );
    }


    public function almaDoInput()
    {
        // Capturar Tests do BdsmTest.Org
        /**
         * Sou da Zona Oeste de SP, 1,65 cm, solteira.<br />
         * Tenho como práticas preferidas o  Pet play, Rape play, Age play, chuva prateada e Spanking leve.Gosto também do &quot;break me&quot;.<br />
         * Tenho como limites à chuva dourada, marrom e vermelha, coisa que envolvam corte, agulhas, sangue, entre outras práticas mais intensas e similares.<br />
         * Não aceito irmãs de coleira.<br />
         * Não me considero submissa..<br />
         * <br />
         * == Results from bdsmtest.org == <br />
         * 100% Ageplayer <br />
         * 100% Boy/Girl <br />
         * 100% Pet<br />
         * 98% Submissive <br />
         * 94% Primal (Prey) <br />
         * 75% Degradee <br />
         * 72% Masochist <br />
         * 60% Slave <br />
         * 51% Brat <br />
         * 45% Rope bunny <br />
         * 43% Vanilla <br />
         * 40% Experimentalist <br />
         * 4% Degrader<br />
         * 2% Dominant  <br />
         * 1% Brat tamer <br />
         * 1% Master/Mistress <br />
         * 1% Primal (Hunter) <br />
         * 0% Exhibitionist <br />
         * 0% Rigger <br />
         * 0% Daddy/Mommy <br />
         * 0% Voyeur <br />
         * 0% Owner <br />
         * 0% Sadist <br />
         * 0% Non-monogamist <br />
         * 0% Switch
         * **/
    }
}
