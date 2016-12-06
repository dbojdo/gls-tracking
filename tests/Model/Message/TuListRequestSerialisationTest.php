<?php
/**
 * TuListRequestSerialisationTest.php
 *
 * @author dbojdo - Daniel Bojdo <daniel.bojdo@web-it.eu>
 * Created at: 2016-12-06 11:51
 */

namespace Webit\GlsTracing\Tests\Model\Message;

use Webit\GlsTracking\Tests\AbstractGlsTrackingTest;
use Webit\GlsTracking\Model\DateTime;
use Webit\GlsTracking\Model\Message\TuListRequest;
use Webit\GlsTracking\Model\Parameters;

class TuListRequestSerialisationTest extends AbstractGlsTrackingTest
{
    /**
     * @test
     * @dataProvider tuListRequest
     *
     * @param TuListRequest $request
     * @param $expectedJson
     */
    public function shouldSerialiseTuListRequest(TuListRequest $request, $expectedJson)
    {
        $this->assertEquals($expectedJson, $this->serialiser()->serialize($request, 'json'));
    }

    public function tuListRequest()
    {
        return array(
            array(
                new TuListRequest(
                    new DateTime(2016, 12, 1),
                    new DateTime(2016, 12, 1),
                    '23234222',
                    '43234343',
                    new Parameters(
                        'LangCode',
                        'EN'
                    )
                ),
                '{"RefValue":"23234222","Parameters":{"ParamCode":"LangCode","ParamValue":"EN"},"CustomRef":"43234343","DateFrom":{"Year":2016,"Month":12,"Day":1,"Hour":0,"Minut":0},"DateTo":{"Year":2016,"Month":12,"Day":1,"Hour":0,"Minut":0}}'
            )
        );
    }
}
