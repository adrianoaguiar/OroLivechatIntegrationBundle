<?php

namespace DemacMedia\Bundle\OroLivechatIntegrationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use LiveChat\Api\Client as LiveChat;
use Symfony\Component\Security\Acl\Exception\Exception;


class LivechatController extends Controller
{
    protected $liveChat;


    /**
     * @Route("/", name="demacmedia_livechat_chat_index")
     * @Template
     */
    public function indexAction(Request $request) {
        return $this->render('DemacMediaOroLivechatIntegrationBundle:LivechatInc:index.html.twig');

        /*
        $response = new Response();

        $response->setContent(
            base64_decode('R0lGODdhAQABAIAAAPxqbAAAACwAAAAAAQABAAACAkQBADs=')
        );

        $response->headers->set('Content-Type', 'image/gif');
        $response->setPrivate();
        $response->headers->addCacheControlDirective('no-cache', true);
        $response->headers->addCacheControlDirective('must-revalidate', true);

        return $response;
        */
    }



    /**
     * @Route("/view/{chatId}", name="demacmedia_livechat_chat_view")
     */
    public function viewChatAction($chatId) {

        die($chatId);

    }


    /**
     * @Route("/chats", name="demac_oro_livechat_integration_get_chats")
     */
    public function getChatsAction()
    {
        /*
        $apiUser = $this->container->getParameter('demacmedia.livechat.user');
        $apiKey  = $this->container->getParameter('demacmedia.livechat.key');

        $liveChatApi = $this->liveChatLogin(
            $apiUser,
            $apiKey
        );

        $totalChats = $this->getTotalChats();

        $transcripts = $this->liveChat->chats->get([
            'value' => 'foo@example.org'
        ]);

        return new Response(
            print_r(
                $transcripts,
                true
            )
        );
        */
    }

    protected function liveChatLogin($user, $key)
    {
        try {
            $this->liveChat = new LiveChat($user, $key);
            return $this;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    protected function getTotalChats()
    {
        $totalChats = $this->liveChat->reports->get(
            'chats',
            ['total_chats']
        );

        return $totalChats;
    }

    protected function getChats()
    {
        $totalChats = $this->liveChat->reports->get(
            'chats',
            ['total_chats']
        );

        return $totalChats;
    }




}
