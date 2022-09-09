<?php

namespace App\Http\Livewire\Admin\SocialLink;

use App\Models\SocialLink;
use Livewire\Component;

class SocialLinkComponent extends Component
{

    public $facebook, $youtube, $twitter, $linkedin, $whatsapp, $pinterest, $instagram, $snapchat, $wechat, $telegram, $reddit, $skype, $github, $website;

    public function mount()
    {
        $social_link = SocialLink::where('id', admin()->id)->first();
        if ($social_link != '') {
            $this->facebook = $social_link->facebook;
            $this->youtube = $social_link->youtube;
            $this->twitter = $social_link->twitter;
            $this->linkedin = $social_link->linkedin;
            $this->whatsapp = $social_link->whatsapp;
            $this->pinterest = $social_link->pinterest;
            $this->instagram = $social_link->instagram;
            $this->snapchat = $social_link->snapchat;
            $this->wechat = $social_link->wechat;
            $this->telegram = $social_link->telegram;
            $this->reddit = $social_link->reddit;
            $this->skype = $social_link->skype;
            $this->github = $social_link->github;
            $this->website = $social_link->website;
        }
    }

    public function storeData()
    {

        $admin = SocialLink::where('id', admin()->id)->first();
        $admin->facebook = $this->facebook;
        $admin->youtube = $this->youtube;
        $admin->twitter = $this->twitter;
        $admin->linkedin = $this->linkedin;
        $admin->whatsapp = $this->whatsapp;
        $admin->pinterest = $this->pinterest;
        $admin->instagram = $this->instagram;
        $admin->snapchat = $this->snapchat;
        $admin->wechat = $this->wechat;
        $admin->telegram = $this->telegram;
        $admin->reddit = $this->reddit;
        $admin->skype = $this->skype;
        $admin->github = $this->github;
        $admin->website = $this->website;

        $admin->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Social link updated successfully!']);
    }

    public function render()
    {
        return view('livewire.admin.social-link.social-link-component')->layout('livewire.admin.layouts.base');
    }
}
