<?php

namespace DJBlaster\BlasterBundle\Entity;

use Doctrine\ORM\EntityRepository;

use DJBlaster\BlasterBundle\Entity\AdPSA;
/**
 * DJReadPSARepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DJReadPSARepository extends EntityRepository
{
    public function findAllForPSA(AdPSA $psa) {
        return $this->findBy(array('psa' => $psa), array('time_read' => 'ASC'));
    }

    public function getRecentReads($numToGet) {

        $fields = array(
            'r.dj_initials',
            'r.time_read',
            'p.ad_name',
            'u.id as customer_id',
            'u.name as customer_name',
            'c.campaign_id',
            'c.campaign_name'
        );

        $qb = $this->createQueryBuilder('r');
        $query = $qb->select($fields)
            ->innerJoin('DJBlasterBundle:AdPSA', 'p', 'WITH', 'p.psa_id = r.psa')
            ->innerJoin('DJBlasterBundle:CustomerCampaign', 'c', 'WITH', 'c.campaign_id = p.campaign')
            ->innerJoin('DJBlasterBundle:Customer', 'u', 'WITH', 'u.id = p.customer')
            ->orderBy('r.time_read','DESC')
            ->setMaxResults($numToGet)
            ->getQuery();        

        $result =  $query->getResult();
        //echo $query->getSql();var_dump($query->getParameters());die;
        return $result;
    }
}
