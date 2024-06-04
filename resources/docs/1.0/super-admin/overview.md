# Início

---

- [Definir os tipos de documentação](#tipos-documentacao)
- [Permissões para documentação](#documentacao-permissoes)
- [Override às traduçoes](#override-translations)
- [Menus](#imenus)
- [Infyom](#infyom-documentacao)
- [CKEditor5](#ckeditor-documentacao)

<a name="tipos-documentacao"></a>
## Definir os tipos de documentação

O laravel starter Midone vêm preparado com documentação por role, ou seja, cada code poderá ter a sua própria documentação.

É importante desativar ou escrever corretamente a documentação para cada um dos roles, e definir no ficheiro index.md o menu da esquerda da documentação, o ficheiro index.md que está na root da pasta não é usado.
Os links no ficheiro index.md devem ser sempre os locais e não ter nada a referênciar o tipo de role.

**Já não é necessário** - Deve também replicar o conteúdo que está no ficheiro overview de cada pasta de um role para o overview.md global e colocar dentro da respetiva permissão, isto é algo redundante e na realidade podiamos deixar de ter um overview dentro de cada pasta e só ter nestas pastas da documentação por role outros especificos. Isto acontece porque na root da pasta da documentação precisamos sempre ter o ficheiros index.md e o overview.md


<a name="documentacao-permissoes"></a>
## Permissões para documentação

Ir ao ficheiro *AuthServiceProvider* e colocar correctamente as permissões. Se for necessário criar mais roles com documentação diferente ou agrevar a documentação para vários roles numa só pasta devemos alterar o ficheiro Overrides/larecipe/Documentation.php, aqui temos definido que pastas são usadas dependendo do role.


<a name="override-translations"></a>
## Override às traduções

As traduçoes não permitem facilmente categorizar o que queremos traduzir, por exemplo criar uma separação entre traduções de backend e frontend, a maneira para o fazer é criar a tradução do estilo __('frontend.Welcome'), o problema é que este tipo de traduções vai obrigar a traduzir sempre o inglês caso contrário irá escrever no ecrã 'frontend.Welcome', para combater isto criei um override às funções de tradução do laravel que permite antes de enviar o texto final para o ecrã retirar um certo conjunto de palavras reservadas da string. Por exemlo se metermos a palavra reservada "frontend." ele mesmo que não exista tradução irá retirar da string que envia para o ecra e colocará só "Welcome".

Para implementar isto devemos ir a config/app.php e comentar **Illuminate\Translation\TranslationServiceProvider::class** e colocar no seu lugar **App\Providers\TranslationServiceProvider::class** assim passará a usar o service provider modificado que irá chamar a class "App\Overrides\translation\Translator", é neste ficheiro que devemos colocar as palavras reservadas que queremos, atualmente está apenas com a palavra "app.". 

<a name="menus"></a>
## Menus

Para editar o menu no backend devo ir a app/View/Composers/MenuComposer.php e editar

<a name="infyom-documentacao"></a>
## Informações do infyom

Se for para criar uma api devo publicar correr o comando **php artisan infyom:publish** ele publica alguns ficheiros interessantes
Atualmente o infyom necessita to ide-helper para gerar automaticamente comentários nos modelos.
Se quisermos gerar novamente comentários nos modelos podemos correr manualmente o comando **php artisan ide-helper:models --write**
Para gerar o crud para um dado modelo devemos correr o comando **php artisan infyom:scaffold Demo --fromTable --relations --skip=menu**

<a name="ckeditor-documentacao"></a>
## Informações do CKEditor 5

Para criar um custom plugin para o ckeditor tive que compilar de novo todo o plugin, não funcionava bem usando o vite então exportei uma versão personalizada do site deles e coloquei em /resources/js/vendor/ckeditor/custom atualmente temos que editar o ficheiro src/ckeditor.ts e depois voltar a compilar, para isso temos que ir à pasta /resources/js/vendor/ckeditor/custom e correr npm run build
  


