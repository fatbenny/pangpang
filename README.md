<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## SOLID 與 設計模式

## 單一職責原則 (Single Responsibility Principle):
- OrderController 只負責處理訂單請求
- OrderRequest 只負責驗證輸入的訂單資料
- OrderService 只負責處理訂單的業務邏輯
- OrderValidator 只負責訂單資料的格式檢查
- OrderTransformer 只負責訂單資料的轉換


## 開放封閉原則 (Open Closed Principle):
- OrderValidator 可不斷增加需要的判斷方式
- CurrencyConverter 可不斷新增其他國家幣別


## 相依反轉原則 (Dependency Inversion principle):
在 Laravel 中，可以通過使用依賴注入來應用此原則。通過將依賴項定義為抽象而不是具體實現，可以更改依賴項的實現，而不會影響依賴於依賴項的代碼。
