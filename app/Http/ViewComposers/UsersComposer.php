<?php

namespace App\Http\ViewComposers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UsersComposer
{
    private $_user;
    private $_userRole;

    public function __construct()
    {
        $currentUser = \Auth::user();
        $this->user = $currentUser;

        if ($currentUser) {
            $this->userRole = strtolower($currentUser->roles[0]->name);
        }
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $user = $this->user;
        if (!$user) {
            return false;
        }

        $userRole = $this->userRole;
        $totalUsers = $this->getTotalUsers($user);
        $userCardBg = $this->getUserBg($userRole);
        $userLevelData = $this->getUserLevelData($userRole);
        $accessLevelBgs = $this->getAccessLevelBgs();
        $userPermDetails = $this->getUserPermDetails();

        $data = [
            'totalUsers'       => $totalUsers,
            'userCardBg'       => $userCardBg,
            'levelIcon'        => $userLevelData['levelIcon'],
            'levelName'        => $userLevelData['levelName'],
            'levelBgClass'     => $userLevelData['levelBgClass'],
            'leveIconlBgClass' => $userLevelData['leveIconlBgClass'],
            'accessLevel1Bg'   => $accessLevelBgs['accessLevel1Bg'],
            'accessLevel2Bg'   => $accessLevelBgs['accessLevel2Bg'],
            'accessLevel3Bg'   => $accessLevelBgs['accessLevel3Bg'],
            'accessLevel4Bg'   => $accessLevelBgs['accessLevel4Bg'],
            'accessLevel5Bg'   => $accessLevelBgs['accessLevel5Bg'],
            'userPermDetails'  => $userPermDetails,
        ];

        $view->with($data);
    }

    /*
     * Get the Users level details
     * @param string $userRole
     * @return array
     */
    private function getUserLevelData($userRole)
    {
        if ($userRole == 'admin') {
            return [
                'levelIcon'        => 'supervisor_account',
                'levelName'        => 'Admin Access',
                'levelBgClass'     => 'mdl-color--red-200',
                'leveIconlBgClass' => 'mdl-color--red-500',
            ];
        }

        return [
            'levelIcon'        => 'perm_identity',
            'levelName'        => 'User Access',
            'levelBgClass'     => 'mdl-color--blue-200',
            'leveIconlBgClass' => 'mdl-color--blue-500',
        ];
    }

    /*
     * Get a count of the total number of users
     * @param collection $user
     * @return int
     */
    private function getTotalUsers($user)
    {
        if (Auth::check() && $user->hasRole('admin')) {
            return count($this->getAllUsers());
        }
    }

    /*
     * Get the Users Bage based on role
     * @param string $userRole
     * @return string
     */
    private function getUserBg($userRole)
    {
        switch ($userRole) {
            case 'admin':
                $userCardBg = 'mdl-color--primary';
                break;

            case 'user':
            default:
                $userCardBg = 'mdl-color--primary';
                break;
        }

        return $userCardBg;
    }

    /*
     * Get a count of the total number of users
     * @return collection
     */
    private function getAllUsers()
    {
        return User::all();
    }

    /*
     * Get user access level background colors
     * @param (optional) string $baseColor
     * @return array
     */
    public function getAccessLevelBgs($baseColor = null)
    {
        $baseColor = $baseColor ?: 'green';

        return [
            'accessLevel5Bg' => 'mdl-color--'.$baseColor.'-900',
            'accessLevel4Bg' => 'mdl-color--'.$baseColor.'-700',
            'accessLevel3Bg' => 'mdl-color--'.$baseColor.'-600',
            'accessLevel2Bg' => 'mdl-color--'.$baseColor.'-400',
            'accessLevel1Bg' => 'mdl-color--'.$baseColor.'-200',
        ];
    }

    /*
     * Get user permissions details
     * @return array
     */
    public function getUserPermDetails()
    {
        return [
            'view'    => [
                'icon'   => 'visibility',
                'bg'     => 'mdl-color--blue-400',
                'iconBg' => 'mdl-color--blue-700',
            ],
            'create'  => [
                'icon'   => 'note_add',
                'bg'     => 'mdl-color--green-400',
                'iconBg' => 'mdl-color--green-800',
            ],
            'edit'    => [
                'icon'   => 'build',
                'bg'     => 'mdl-color--yellow-700',
                'iconBg' => 'mdl-color--yellow-900',
            ],
            'delete'  => [
                'icon'   => 'delete_forever',
                'bg'     => 'mdl-color--red-300',
                'iconBg' => 'mdl-color--red-700',
            ],
        ];
    }
}
