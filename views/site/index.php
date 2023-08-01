<?php

/** @var yii\web\View $this */

/** @var \app\models\Candidate $candidate */
/** @var bool $disabled */

use yii\helpers\Html;

$this->title = 'Vote';
?>
<div class="tw-w-full tw-flex tw-flex-col ">
    <div class="tw-w-full tw-flex lg:tw-flex-row tw-flex-col tw-items-center lg:tw-items-start">
        <img src="/images/bg-home.webp" alt="bg" class="tw-max-h-[300px] lg:tw-max-h-[500px] tw-w-auto">
        <img src="/images/welcome.webp" alt="bg" class="tw-mt-10 lg:tw-mt-24 tw-max-h-[500px] tw-w-auto">
    </div>
    <div class="tw-mt-16 tw-w-full tw-flex tw-flex-col lg:tw-flex-row tw-gap-5"
         x-data="{
        voteClick: function (ref) {
            console.log(ref)
        }
    }">
        <div class="tw-flex tw-flex-col tw-w-full lg:tw-w-1/2 tw-items-center tw-space-y-6">
            <img src="/images/candidate/1.png" alt="Candidate 1" width="500px"
                 class="tw-rounded-3xl tw-drop-shadow-2xl">
            <?php
            echo Html::button('VOTE', [
                'class' => '
                tw-py-2
                tw-px-3
                tw-my-2
                tw-rounded-lg
                tw-bg-[#647d54]
                tw-text-white
                tw-transition
                tw-text-xl
                hover:tw-bg-[#482e1d]
                disabled:tw-cursor-not-allowed
                disabled:tw-bg-gray-900/60
            ',
                '@click' => 'voteClick(1)',
                'disabled' => $disabled
            ]) ?>
            <span class="tw-font-bold tw-text-2xl">VISI</span>
            <div class="tw-text-justify tw-p-2">
                Mewujudkan HIMAKOM sebagai organisasi yang berkualitas, sistematis, dan totalitas. Serta mewujudkan
                organisasi yang berlandaskan aspirasi dan kreativitas masyarakat Komunikasi Universitas Pertamina.
            </div>
            <span class="tw-font-bold tw-text-2xl">MISI</span>
            <ol class="tw-list-decimal tw-text-justify tw-p-5">
                <li>Meningkatkan totalitas setiap aspek organisasi untuk membentuk HIMAKOM UPER yang berkualitas.</li>
                <li>Menciptakan struktur serta jaringan komunikasi yang jelas dan tepat.</li>
                <li>Menghadirkan iklim organisasi yang berlandaskan kekeluargaan dan profesionalitas.</li>
                <li>Menjadikan HIMAKOM  UPER sebagai wadah aspirasi, apresiasi, dan pengembangan minat bakat seluruh mahasiswa Komunikasi Universitas Pertamina.</li>
                <li>Menjalin hubungan dengan berbagai pihak untuk dapat tercapainya tujuan dari HIMAKOM sebagai organisasi yang bersinergi.</li>
            </ol>
        </div>
        <div class="tw-flex tw-flex-col tw-w-full lg:tw-w-1/2 tw-items-center tw-space-y-6">
            <img src="/images/candidate/2.png" alt="Candidate 2" width="500px"
                 class="tw-rounded-3xl tw-drop-shadow-2xl">
            <?= Html::button('VOTE', [
                'class' => '
                tw-py-2
                tw-px-3
                tw-my-2
                tw-rounded-lg
                tw-bg-[#647d54]
                tw-text-white
                tw-transition
                tw-text-xl
                hover:tw-bg-[#482e1d]
                disabled:tw-cursor-not-allowed
                disabled:tw-bg-gray-900/60
            ',
                '@click' => 'voteClick(2)',
                'disabled' => $disabled
            ]) ?>
            <span class="tw-font-bold tw-text-2xl">VISI</span>
            <div class="tw-text-justify tw-p-2">
                Mewujudkan Organisasi HIMAKOM berlandaskan asas kekeluargaan serta menjadi wadah aspirasi dan mengembangkan potensi diri mahasiswa komunikasi.
            </div>
            <span class="tw-font-bold tw-text-2xl !tw-mt-12">MISI</span>
            <ol class="tw-list-decimal tw-text-justify tw-p-5">
                <li>Mempererat rasa solidaritas dan saling mengapresiasi sesama masyarakat komunikasi.</li>
                <li>Melayani serta menjadi wadah aspirasi dan inspirasi untuk HIMAKOM menjadi lebih baik.</li>
                <li>Mengoptimalkan potensi diri dan mendorong mahasiswa menjadi aktif dan berprestasi.</li>
                <li>Menjalin hubungan yang baik secara internal maupun eksternal.</li>
            </ol>
        </div>
    </div>
</div>
