const nav = () => {
    return """
     <nav
        class="bg-dark border border-top-0 border-end-0 border-start-0 line border-5 p-3">
        <div class="d-flex flex-nowrap align-items-center flex-grow-1">
          <h1>
            <a href="#" class="text-white">Kosmetyczka</a>
          </h1>
          <ul
            class="d-flex flex-nowrap align-items-center justify-content-end flex-grow-1"
          >
            <li class="align-items-center m-3">
              <h2>
                <a class="text-white" aria-current="page" href="#">Zabiegi</a>
              </h2>
            </li>
            <li class="align-items-center m-3">
              <h2>
                <a class="text-white" aria-current="page" href="#">Zaloguj</a>
              </h2>
            </li>
          </ul>
        </div>
      </nav> 
      """   
}