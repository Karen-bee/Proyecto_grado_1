<?php include '../header.php'; ?>

<title>Eventos</title>

<h1 id="eventos-title">bienvenido a <p>Eventos Literagiando</p></h1>
<div class="img-eventos">
    <div class="capa-opacity"></div>
</div>
    
<div class="content-search-eventos">
    <form class="d-flex" role="search">
    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"><i class='bx bx-search'></i></button>
    </form>
</div> 


<div class="content-event">
    <div class="container text-center">
    <div class="row align-items-start">
        <div class="col-3">
            <div class="group-btn-filter">
                <strong>¿Cuando se realizara?</strong>
                <input type="text" name="" id="" class="form-control" placeholder="Desde">
                <input type="text" name="" id="" class="form-control" placeholder="Hasta">
            </div>

            <div class="btn-select">
                <strong>¿Que tipo de evento?</strong>
                <select class="form-select" aria-label="Default select example">
                    <option selected>--Seleccione--</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                
                <button type="button" class="btn btn-outline-warning">Filtrar</button>
            </div>


            <!---- Calendario ------>


            <div class="container-calendar">
                <div class="calendar">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker">May</span>
                        <div class="year-picker" id="year-picker">
                            <span class="year-change" id="pre-year">
                                <pre><</pre>
                            </span>
                            <span id="year">2023</span>
                            <span class="year-change" id="next-year">
                                <pre>></pre>
                            </span>
                        </div>
                    </div>

                    <div class="calendar-body">
                        <div class="calendar-week-days">
                            <div>DO</div>
                            <div>LU</div>
                            <div>MA</div>
                            <div>MI</div>
                            <div>JU</div>
                            <div>VI</div>
                            <div>SA</div>
                        </div>
                        <div class="calendar-days">

                        </div>
                    </div>
                    <div class="calendar-footer">

                    </div>
                    <div class="date-time-formate">
                        <div class="date-time-value">
                            <div class="time-formate">17:51:35</div>
                            <div class="date-formate">23 - Octubre - 2023</div>
                        </div>
                    </div>
                    <div class="month-list"></div>
                </div>
            </div>
        </div>

        <div class="col-9">
        <div class="card-group">
            <div class="card">
                <img src="/Storage/img-home/niños.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><Strong>Taller</Strong></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                <small class="text-body-secondary"><a href="#">Ver Más <i class="bi bi-chevron-double-right"> </i></a></small>
                </div>
            </div>

            <div class="card">
                <img src="/Storage/img-home/niños.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><strong>Lectura en Voz Alta</strong></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                <small class="text-body-secondary"><a href="#">Ver Más <i class="bi bi-chevron-double-right"> </i></a></small>
                </div>
            </div>

            <div class="card">
                <img src="/Storage/img-home/niños.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title"><strong>Curso</strong></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                <small class="text-body-secondary"><a href="#">Ver Más <i class="bi bi-chevron-double-right"> </i></a></small>
                </div>
            </div>

            </div>
        </div>
    </div>
    </div>
</div>

<?php include '../footer.php'; ?>