@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading panel-title text-center">
            ESCOLINHA CRESCENDO BOM DE BOLA
            AV. JOAQUIM FERREIRA LISBOA S/Nº
            QUADRA MUNICIPAL DE JENIPAPO DE MINAS-MG
        </div>

        <div class="panel-body">
            <div class="text-center">
                <img src="{{ asset('/imagens/logo.jpg') }}" width="100" height="90"/>
            </div>

            <h4 class="text-center"><b>FICHA DE INSCRIÇÃO</b></h4>
            <p>Nome do atleta: {{ $nome }} Nascido: {{date('d/m/Y', strtotime($datanascimento))}} Idade: {{ $idade }}</p>

            <p>Bairro: {{ $bairro }} End.: {{ $endereco }} CEP: {{ $cep }} N°: {{ $numero }}</p>
            <p>Colégio: {{ $colegio }} Série: {{ $serie }} turno: {{ $turno }}</p>
            <p>
                Eu, {{ $nomeresponsavel }} responsável pelo menor (atleta) acima citado,
                venho solicitar a sua inscrição na ESCOLINHA DE FUTSAL CBB, assumindo, nesta oportunidade:
            </p>
            <p>
                1) Eximir a  CBB de eventuais acidentes – tais como lesões, machucados,
                torções, etc. – decorrentes da prática de futebol.
                Se ocorrer é dever da CBB prestar os primeiros socorros e comunicar o fato ao responsável,
                que deverá se dirigir ao local indicado a fim de que seja dada continuidade ao atendimento;
            </p>
            <p>
                2) É indispensável que o atleta (aluno) esteja estudando.
                Deverá ser apresentado ATESTADO DE MATRÍCULA ESCOLAR;
            </p>
            <p>
                3) Informar a direção da CBB sobre eventuais PROBLEMAS DE SAÚDE que o atleta venha a sofrer;
            </p>
            <p>
                4) A freqüência do aluno (atleta) nos treinos será controlada pela CBB.
                É cargo do responsável pelo aluno zelar pela freqüência do atleta nos treinamentos;
            </p>
            <p>
                5) Os dias e horários dos treinamentos (turmas) serão divulgados previamente pela organização da CBB.
            </p>
            <p>
                6) Os treinos serão realizados no horário de 8:00 às 10:00 horas aos sábados,
                na quadra municipal de Jenipapo de Minas, pelo instrutor Anderson Soares.
            </p>
            <p>
                7) Os materiais – bem como uniformes para jogos, coletes, bolas,
                cones, etc –serão adquiridos a médio prazo com o apoio financeiro dos pais dos alunos matriculados.
                Nestes termos assino a presente INSCRIÇÃO e AUTORIZO o menor, {{ $nome }} freqüentar a Escolinha de Futsal/CBB,
                informando ainda que o mesmo encontrasse matriculado em escola de ensino regular,
                em plenas condições de saúde para prática de esporte,
                consciente e me responsabilizando por todo e qualquer
                acidente que o menor venha sofrer praticando esporte nos locais de treino na Sede da CBB.
            </p>
            <p>
                <b>OBS</b>: A inscrição só terá validade mediante a apresentação desta ficha preenchida e assinada pelo responsável,
                entrega de documentos e atestados médicos exigidos pela direção da CBB.
            </p>

            <p><center>ASSINATURA DO RESPONSÁVEL ( )PAI OU MÃE ( ) OUTRO – especificar</center></p>
            <hr>

            <p>Identidade N°: {{ $identidade }} Orgão expedidor: {{ $orgaoexpedidor }}</p>

            <p class="text-center">
                Jenipapo de Minas,
                <?php
                setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

                date_default_timezone_set( 'America/Sao_Paulo' );

                echo strftime( '%A, %d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
                ?>.
            </p>

        </div>
    </div>
@endsection

