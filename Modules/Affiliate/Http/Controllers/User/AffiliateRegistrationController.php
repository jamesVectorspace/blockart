<?php
/**
 * @package AffiliateRegistrationController
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 08-08-2023
 */
namespace Modules\Affiliate\Http\Controllers\User;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use App\Services\Mail\UserVerificationCodeMailService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class AffiliateRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function registration(Request $request)
    {
        $user = auth()->user()->affiliateUser()->first();

        if (empty($user) || !empty($user) && $user->status == 'Pending') {

            if ($request->isMethod('get')) {
                return view('affiliate::site.registration');
            }

            return (new AffiliateController)->beAffiliate($request, 'site');
        }

        abort(404);
    }
}
