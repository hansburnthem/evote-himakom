<?php

/** @var yii\web\View $this */
/** @var Vote $vote */

use app\models\Vote;

$this->title = 'Bukti Surat Suara';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tw-flex tw-flex-row tw-items-center tw-justify-center tw-mt-10">
    <div class="tw-bg-white tw-w-max-[500px] tw-rounded-2xl tw-drop-shadow-2xl tw-p-5">
        <h3 class="tw-text-3xl tw-font-bold"><u>Your Vote</u></h3>
        <p class="tw-mt-5 tw-p-2 tw-bg-gray-300 tw-rounded-md">
            <b><?= $vote->candidate->name ?></b> on <b><?= date('l, d F Y H:i:s', strtotime($vote->created_at)) ?></b>
        </p>
        <p class="tw-mt-5">
            Silahkan melakukan screenshot pada halaman ini, kemudian mengisi form di bawah ini.
        </p>
        <a href="https://bit.ly/BuktiSuratSuaraPemilihanRaya" class="tw-underline tw-text-blue-500">bit.ly/BuktiSuratSuaraPemilihanRaya</a>
    </div>
</div>
