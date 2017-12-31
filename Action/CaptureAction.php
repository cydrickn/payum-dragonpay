<?php
namespace Cydrickn\DragonPay\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayAwareTrait;
use Payum\Core\Request\Capture;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Reply\HttpRedirect;

class CaptureAction implements ActionInterface
{
    use GatewayAwareTrait;
    
    const TEST_ENDPOINT = 'http://test.dragonpay.ph';
    const PROD_ENDPOINT = 'https://gw.dragonpay.ph';

    /**
     * {@inheritDoc}
     *
     * @param Capture $request
     */
    public function execute($request)
    {
        RequestNotSupportedException::assertSupports($this, $request);

        $model = ArrayObject::ensureArrayObject($request->getModel());
    }

    /**
     * {@inheritDoc}
     */
    public function supports($request)
    {
        return
            $request instanceof Capture
            && $request->getModel() instanceof \ArrayAccess
        ;
    }
    
    private function generateUrl($model)
    {
        
    }
}
