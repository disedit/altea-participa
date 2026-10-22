<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Edition;
use App\Ballot;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class BallotController extends Controller
{
    /**
     * JSON object with edition information, including ballot questions
     *
     * @return \Illuminate\Http\Response
     */
    public function ballotJSON()
    {
        $edition = Edition::current('ballot');
        return response()->json($edition);
    }

    /**
     * QR image that links to a stored ballot on the system
     *
     * @return \Illuminate\Http\Response
     */
    public function ballotQR($ref)
    {
        $renderer = new ImageRenderer(new RendererStyle(200, 0), new SvgImageBackEnd);
        $qr = (new Writer($renderer))->writeString(secure_url('ballot/' . $ref));

        return response($qr)->header('Content-Type', 'image/svg+xml');
    }
}
