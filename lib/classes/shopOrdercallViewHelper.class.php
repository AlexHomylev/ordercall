<?php

class shopOrdercallViewHelper
{

    public static function display()
    {
        return static::getPage();
    }

    private static function getPage() : string {
        $settings = wa('shop')->getPlugin('ordercall')->getSettings();
        $link = $settings['link'];
        $captcha = wa('shop')->getCaptcha()->getHtml();

        if (!$settings['work']) return '';

        return self::getHtml($link, $captcha);
    }

    private static function getHtml($link, $captcha) : string
    {
        return <<<EOT
<div class="container">  
  <form id="order_call_form" action="/" name="order_call_form" method="post">
    <h3>Заказать звонок</h3>
    <h4>С вами свяжется наш специалист</h4>
    <fieldset>
      <input placeholder="Ваше имя" id="name" name="name" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Email" id="email" name="email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Номер телефона" id="phone" name="phone" type="tel" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Удобное время для звонка" id="time_call" name="time_call" type="datetime-local" tabindex="4" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Комментарий" id="comment" name="comment" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
    $captcha
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Отправка">Отправить</button>
    </fieldset>
    <p class="copyright">Политика конфидециальности <a href="$link" target="_blank">ТУТ</a></p>
  </form>
</div>
EOT;
    }
}