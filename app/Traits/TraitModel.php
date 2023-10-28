<?php

namespace App\Traits;

trait TraitModel
{ 
    /**
     * @param int $page
     * @param int $per_page
     * @return array
     */
    public function customizedPagned($currentPage = 1, $per_page = 10): array
    {
        $page = $currentPage === 1 ? 0 : ($currentPage - 1);
        $offset = $page * $per_page;
        $totalRegistros = $this->query()->count();
        $totalPages = ceil($totalRegistros /$per_page);

        return [
            'result' => $this->query()->offset($offset)->limit($per_page)->get(),
            'page' => $currentPage,
            'per_page' => $per_page,
            'total_registros' => $totalRegistros,
            'total_pages' => $totalPages
        ];
    }

    /**
      * Devolve a paginacao com links do bootstrap
     * @param int $page
     * @param int $per_page
     * @return array
     */
    public function customizedPagnedWithLinks($currentPage = 1, $per_page = 10): array
    {
        $resultPagination = $this->customizedPagned($currentPage, $per_page);

        $previous = ($currentPage - 1) < 1 ? 1 : ($currentPage - 1);
        $next = ($currentPage + 1) > $resultPagination['total_pages']  ? $resultPagination['total_pages'] : ($currentPage + 1);
        $previousLinks = [];
        $nextLinks = [];
        $uri = request()->getPathInfo();
        
        //gerando previous link e next links
        for($i = 1; $i < 3; $i++) {

            $linkP = ($currentPage - $i);

            if($linkP > 0) {
                array_push($previousLinks, "<li class='page-item'><a class='page-link' href='{$uri}?page={$linkP}'>".$linkP."</a></li>");
            }

            $linkN = ($currentPage + $i);

            if($linkN <= $resultPagination['total_pages']) {
                array_push($nextLinks, "<li class='page-item'><a class='page-link' href='{$uri}?page={$linkN}'>".$linkN ."</a></li>");
            }
        }

        $linksPrevious = implode('', array_reverse($previousLinks));
        $linksNext = implode('', $nextLinks);

        $resultPagination['links'] =  "<nav aria-label='Page navigation example'>
            <ul class='pagination'>
                <li class='page-item'><a class='page-link' href='{$uri}?page={$previous}'>Previous</a></li>
                ".$linksPrevious."
                <li class='page-item active' aria-current='page'>
                    <a class='page-link' href='#'>$currentPage</a>
                </li>
                ".$linksNext."
                <li class='page-item'><a class='page-link' href='{$uri}?page={$next}'>Next</a></li>
            </ul>
        </nav>";

        return $resultPagination;
    }
}
