<?php
namespace MariaMoreira\BuscadorDeCoisas;


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
// use MariaMoreira\BuscadorDeCoisas\Buscador;


class Buscador{

    private $httpClient;
    private $crawler;

    public function __construct(Client $httpClient, Crawler $crawler){
        $this->httpClient = new Client();
        $this->crawler = new Crawler();
    }

   
    public function buscar($url, $selector){
       
        $resposta = $this->httpClient->request('GET', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        // Filtra a informação através dos seletores CSS
        $tudo_selecionado = $this->crawler->filter($selector);
        $selecionados = [];

        foreach ($tudo_selecionado as $domElement) {
            $selecionados[] = $domElement->textContent . PHP_EOL;
        }

      return $selecionados;
    }





}


?>

