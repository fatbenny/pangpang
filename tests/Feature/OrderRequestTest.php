<?php
namespace Tests\Feature;

use Tests\TestCase;

class OrderRequestTest extends TestCase
{
    public $testData = [
        'id' => 'A0000001',
        'name' => 'Melody Holiday Inn',
        'address' => [
            "city" => "taipei-city",
            "district" => "da-an-district",
            "street" => "fuxing-south-road"
        ],
        "price" => "1000",
        'currency' => 'TWD',
    ];

    /** @test */
    public function test_validates_required_fields()
    {
        $response = $this->postJson('/api/orders', []); // 發送空數據

        $response->assertStatus(422); // 驗證 HTTP 422 狀態碼
        $response->assertJsonValidationErrors(['id', 'name', 'address', 'price', 'currency']); // 驗證錯誤欄位
    }

    /** @test */
    public function test_name_contains_non_english_characters()
    {
        $this->testData['name'] = '111';
        $response = $this->postJson('/api/orders', $this->testData);
        $response->assertStatus(400);
        $response->assertSee('Name contains non-English characters');
    }
    /** @test */
    public function test_name_is_not_capitalized()
    {
        $this->testData['name'] = 'melody holiday inn';
        $response = $this->postJson('/api/orders', $this->testData);
        $response->assertStatus(400);
        $response->assertSee('Name is not capitalized');
    }
    /** @test */
    public function test_price_is_over_2000()
    {
        $this->testData['price'] = 10000;
        $response = $this->postJson('/api/orders', $this->testData);
        $response->assertStatus(400);
        $response->assertSee('Price is over 2000');
    }
    /** @test */
    public function test_currency_format_is_wrong()
    {
        $this->testData['currency'] = 'AAA';
        $response = $this->postJson('/api/orders', $this->testData);
        $response->assertStatus(400);
        $response->assertSee('Currency format is wrong');
    }
    /** @test */
    public function test_currency_converter()
    {
        $this->testData['currency'] = 'USD';
        $response = $this->postJson('/api/orders', $this->testData);
        $response->assertStatus(200);
        $response->assertSee(31000);
    }

}