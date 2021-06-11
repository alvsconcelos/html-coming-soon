<div class="wrap">
    <h1><?php _e('HTML Coming Soon', 'html-coming-soon'); ?></h1>
    <p>If you have posts or comments in another system, WordPress can import those into this site. To get started, choose a system to import from below:</p>



    <div class="widefat">
        <form action="#" method="GET">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="behavior">O que será renderizado</label></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span>O que será renderizado</span>
                            </legend>
                            <select id name="behavior">
                                <option value="off">Nada / Desativado</option>
                                <option value="template">Template</option>
                                <option value="html">Código HTML</option>
                            </select>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Caminho do template</th>
                    <td>
                        <p><?php _e('O template deve ser adicionado ao seu tema/tema filho:', 'html-coming-soon'); ?> <code>oioioi</code></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="code">Código HTML</label></th>
                    <td>
                        <textarea name="code" id="code" cols="30" rows="10"></textarea>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <input type="submit" name="submit" id="submit" class="button button-primary" value="Salvar configurações">
            </p>
        </form>
    </div>
</div>