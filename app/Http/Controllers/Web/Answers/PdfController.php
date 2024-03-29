<?php

namespace App\Http\Controllers\Web\Answers;

use App\Http\Controllers\Web\Controller;
use App\Models\Recipe;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function answerGeneratePdf($answerId)
    {
        $answer = Recipe::query()
            ->where('id', $answerId)
            ->withoutGlobalScopes(['isApproved', 'isRoadMap'])
            ->firstOrFail();

        $data = [
            'title' => $answer->question,
            'answer' => $answer->answer,
        ];

        $pdf = Pdf::loadView('web.pdf.answer', $data);
        $pdf->setOptions(['defaultFont' => 'arialuni']);
        return $pdf->download($answer->slug . '.pdf');
    }
}
