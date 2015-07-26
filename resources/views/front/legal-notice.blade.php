@extends('layouts.skeleton')

@section('body')
    @include('front.includes.header')

    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Mentions légales</h2>

                <article>
                    <p>Le pr&eacute;sent site "www.afup.og" est la propri&eacute;t&eacute; de l'association AFUP
                        (Association Fran&ccedil;aise
                        des Utilisateurs de PHP) enregistr&eacute;e au SIREN avec le num&eacute;ro 50086901100014, et
                        localis&eacute;e
                        :</p>
                    <blockquote>32 boulevard de Strasbourg<br/>CS 30108<br/>75468 Paris Cedex 10.</blockquote>
                    <p>&nbsp;</p>

                    <p>Directeur de la publication : M. Le Pr&eacute;sident</p>

                    <p>Responsable &eacute;ditorial : M. Le Secr&eacute;taire</p>

                    <p>Web Design : Agence Les Polypodes <a href="http://www.lespolypodes.com">http://www.lespolypodes.com/</a>
                    </p>

                    <p>Int&eacute;gration &amp; d&eacute;veloppement : MM. Les B&eacute;n&eacute;voles</p>

                    <p>H&eacute;bergement : gracieusement offert par Gandi <a href="https://www.gandi.net/hebergement/">https://www.gandi.net/hebergement/</a>
                    </p>

                </article>
            </div>

            <div class="col-lg-3">
                @include('front.includes.sidebar')
            </div>
        </div>
    </div>

    @include('front.includes.footer')
@endsection