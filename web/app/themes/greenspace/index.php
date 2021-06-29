<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Greenspace
 * @since Greenspace 0.1
 */

get_header();

if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content' );
	}

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

}

?>

    <div class="bd-cheatsheet">
        <section id="content">
            <h2 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3">Contents</h2>

            <article class="my-3" id="typography">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Typography</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/content/typography/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <p class="display-1">Display 1</p>
                        <p class="display-2">Display 2</p>
                        <p class="display-3">Display 3</p>
                        <p class="display-4">Display 4</p>
                        <p class="display-5">Display 5</p>
                        <p class="display-6">Display 6</p>
                    </div>

                    <div class="bd-example">
                        <p class="h1">Heading 1</p>
                        <p class="h2">Heading 2</p>
                        <p class="h3">Heading 3</p>
                        <p class="h4">Heading 4</p>
                        <p class="h5">Heading 5</p>
                        <p class="h6">Heading 6</p>
                    </div>

                    <div class="bd-example">
                        <p class="lead">
                            This is a lead paragraph. It stands out from regular paragraphs.
                        </p>
                    </div>

                    <div class="bd-example">
                        <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                        <p><del>This line of text is meant to be treated as deleted text.</del></p>
                        <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                        <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                        <p><u>This line of text will render as underlined.</u></p>
                        <p><small>This line of text is meant to be treated as fine print.</small></p>
                        <p><strong>This line rendered as bold text.</strong></p>
                        <p><em>This line rendered as italicized text.</em></p>
                    </div>

                    <div class="bd-example">
                        <blockquote class="blockquote">
                            <p>A well-known quote, contained in a blockquote element.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>

                    <div class="bd-example">
                        <ul class="list-unstyled">
                            <li>This is a list.</li>
                            <li>It appears completely unstyled.</li>
                            <li>Structurally, it's still a list.</li>
                            <li>However, this style only applies to immediate child elements.</li>
                            <li>Nested lists:
                                <ul>
                                    <li>are unaffected by this style</li>
                                    <li>will still show a bullet</li>
                                    <li>and have appropriate left margin</li>
                                </ul>
                            </li>
                            <li>This may still come in handy in some situations.</li>
                        </ul>
                    </div>

                    <div class="bd-example">
                        <ul class="list-inline">
                            <li class="list-inline-item">This is a list item.</li>
                            <li class="list-inline-item">And another one.</li>
                            <li class="list-inline-item">But they're displayed inline.</li>
                        </ul>
                    </div>
                </div>
            </article>
            <article class="my-3" id="images">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Images</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/content/images/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <svg class="bd-placeholder-img bd-placeholder-img-lg img-fluid" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text></svg>

                    </div>

                    <div class="bd-example">
                        <svg class="bd-placeholder-img img-thumbnail" width="200" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera: 200x200" preserveAspectRatio="xMidYMid slice" focusable="false"><title>A generic square placeholder image with a white border around it, making it resemble a photograph taken with an old instant camera</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">200x200</text></svg>

                    </div>
                </div>
            </article>
            <article class="my-3" id="tables">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Tables</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/content/tables/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bd-example">
                        <table class="table table-dark table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bd-example">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Class</th>
                                <th scope="col">Heading</th>
                                <th scope="col">Heading</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Default</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>

                            <tr class="table-primary">
                                <th scope="row">Primary</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-secondary">
                                <th scope="row">Secondary</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-success">
                                <th scope="row">Success</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-danger">
                                <th scope="row">Danger</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-warning">
                                <th scope="row">Warning</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-info">
                                <th scope="row">Info</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-light">
                                <th scope="row">Light</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            <tr class="table-dark">
                                <th scope="row">Dark</th>
                                <td>Cell</td>
                                <td>Cell</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="bd-example">
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
            <article class="my-3" id="figures">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Figures</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/content/figures/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <figure class="figure">
                            <svg class="bd-placeholder-img figure-img img-fluid rounded" width="400" height="300" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 400x300" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em">400x300</text></svg>

                            <figcaption class="figure-caption">A caption for the above image.</figcaption>
                        </figure>
                    </div>
                </div>
            </article>
        </section>

        <section id="forms">
            <h2 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3">Forms</h2>

            <article class="my-3" id="overview">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Overview</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/forms/overview/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <fieldset class="mb-3">
                                <legend>Radios buttons</legend>
                                <div class="form-check">
                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio1">
                                    <label class="form-check-label" for="exampleRadio1">Default radio</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="radio" name="radios" class="form-check-input" id="exampleRadio2">
                                    <label class="form-check-label" for="exampleRadio2">Another radio</label>
                                </div>
                            </fieldset>
                            <div class="mb-3">
                                <label class="form-label" for="customFile">Upload</label>
                                <input type="file" class="form-control" id="customFile">
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                            </div>
                            <div class="mb-3">
                                <label for="customRange3" class="form-label">Example range</label>
                                <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </article>
            <article class="my-3" id="disabled-forms">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Disabled forms</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/forms/overview/#disabled-forms">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <form>
                            <fieldset disabled aria-label="Disabled fieldset example">
                                <div class="mb-3">
                                    <label for="disabledTextInput" class="form-label">Disabled input</label>
                                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-select">
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                                        <label class="form-check-label" for="disabledFieldsetCheck">
                                            Can't check this
                                        </label>
                                    </div>
                                </div>
                                <fieldset class="mb-3">
                                    <legend>Disabled radios buttons</legend>
                                    <div class="form-check">
                                        <input type="radio" name="radios" class="form-check-input" id="disabledRadio1" disabled>
                                        <label class="form-check-label" for="disabledRadio1">Disabled radio</label>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="radio" name="radios" class="form-check-input" id="disabledRadio2" disabled>
                                        <label class="form-check-label" for="disabledRadio2">Another radio</label>
                                    </div>
                                </fieldset>
                                <div class="mb-3">
                                    <label class="form-label" for="disabledCustomFile">Upload</label>
                                    <input type="file" class="form-control" id="disabledCustomFile" disabled>
                                </div>
                                <div class="mb-3 form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="disabledSwitchCheckChecked" checked disabled>
                                    <label class="form-check-label" for="disabledSwitchCheckChecked">Disabled checked switch checkbox input</label>
                                </div>
                                <div class="mb-3">
                                    <label for="disabledRange" class="form-label">Disabled range</label>
                                    <input type="range" class="form-range" min="0" max="5" step="0.5" id="disabledRange">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </article>
            <article class="my-3" id="sizing">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Sizing</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/forms/form-control/#sizing">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <div class="mb-3">
                            <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control form-control-lg" aria-label="Large file input example">
                        </div>
                    </div>

                    <div class="bd-example">
                        <div class="mb-3">
                            <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
                        </div>
                        <div class="mb-3">
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control form-control-sm" aria-label="Small file input example">
                        </div>
                    </div>
                </div>
            </article>
            <article class="my-3" id="input-group">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Input group</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/forms/input-group/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>
                        <label for="basic-url" class="form-label">Your vanity URL</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">With textarea</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                </div>
            </article>
            <article class="my-3" id="floating-labels">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Floating labels</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/forms/floating-labels/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <form>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
            <article class="my-3" id="validation">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Validation</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/forms/validation/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">
                        <form class="row g-3">
                            <div class="col-md-4">
                                <label for="validationServer01" class="form-label">First name</label>
                                <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationServer02" class="form-label">Last name</label>
                                <input type="text" class="form-control is-valid" id="validationServer02" value="Otto" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationServerUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                    <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                                    <div class="invalid-feedback">
                                        Please choose a username.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationServer03" class="form-label">City</label>
                                <input type="text" class="form-control is-invalid" id="validationServer03" required>
                                <div class="invalid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationServer04" class="form-label">State</label>
                                <select class="form-select is-invalid" id="validationServer04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="validationServer05" class="form-label">Zip</label>
                                <input type="text" class="form-control is-invalid" id="validationServer05" required>
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                                    <label class="form-check-label" for="invalidCheck3">
                                        Agree to terms and conditions
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </section>

        <section id="components">
            <h2 class="sticky-xl-top fw-bold pt-3 pt-xl-5 pb-2 pb-xl-3">Components</h2>

            <article class="my-3" id="buttons">
                <div class="bd-heading sticky-xl-top align-self-start mt-5 mb-3 mt-xl-0 mb-xl-2">
                    <h3>Buttons</h3>
                    <a class="d-flex align-items-center" href="/docs/5.0/components/buttons/">Documentation</a>
                </div>

                <div>
                    <div class="bd-example">

                        <button type="button" class="btn btn-primary">Primary</button>
                        <button type="button" class="btn btn-secondary">Secondary</button>
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-danger">Danger</button>
                        <button type="button" class="btn btn-warning">Warning</button>
                        <button type="button" class="btn btn-info">Info</button>
                        <button type="button" class="btn btn-light">Light</button>
                        <button type="button" class="btn btn-dark">Dark</button>

                        <button type="button" class="btn btn-link">Link</button>
                    </div>

                    <div class="bd-example">

                        <button type="button" class="btn btn-outline-primary">Primary</button>
                        <button type="button" class="btn btn-outline-secondary">Secondary</button>
                        <button type="button" class="btn btn-outline-success">Success</button>
                        <button type="button" class="btn btn-outline-danger">Danger</button>
                        <button type="button" class="btn btn-outline-warning">Warning</button>
                        <button type="button" class="btn btn-outline-info">Info</button>
                        <button type="button" class="btn btn-outline-light">Light</button>
                        <button type="button" class="btn btn-outline-dark">Dark</button>
                    </div>

                    <div class="bd-example">
                        <button type="button" class="btn btn-primary btn-sm">Small button</button>
                        <button type="button" class="btn btn-primary">Standard button</button>
                        <button type="button" class="btn btn-primary btn-lg">Large button</button>
                    </div>
                </div>
            </article>
        </section>
    </div>

<?php


get_footer();
